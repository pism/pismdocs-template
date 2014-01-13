#!/usr/bin/env python
from mpl_toolkits.basemap import Basemap

try:
    from netCDF4 import Dataset as NC
except:
    from netCDF3 import Dataset as NC

import numpy as np
import matplotlib.pyplot as plt
from matplotlib import colors
import sys

rootname='g10km_0'

try:
    nc = NC(rootname+'.nc', 'r')
except:
    print "ERROR: can't read from file ..."
    sys.exit(1)

# we need to know longitudes and latitudes corresponding to out grid
lon = nc.variables['lon'][:]
lat = nc.variables['lat'][:]

# x and y *in the dataset* are only used to determine plotting domain
# dimensions
x = nc.variables['x'][:]
y = nc.variables['y'][:]
width = x.max() - x.min()
height = y.max() - y.min()

# load data and mask out ice-free areas
fill  = nc.variables['csurf']._FillValue
csurf = np.squeeze(nc.variables['csurf'][:])
csurf = np.ma.array(csurf, mask = csurf == fill)

m = Basemap(width=1.2*width,      # width in projection coordinates, in meters
            height=height,      # height
            resolution='l',     # coastline resolution, can be 'l' (low), 'h'
                                # (high) and 'f' (full)
            projection='stere', # stereographic projection
            lat_ts=71,          # latitude of true scale
            lon_0=-41,          # longitude of the plotting domain center
            lat_0=72)           # latitude of the plotting domain center

#m.drawcoastlines()

# draw the Blue Marble background (requires PIL, the Python Imaging Library)
m.bluemarble()

# convert longitudes and latitudes to x and y:
xx,yy = m(lon, lat)

# mark 100 m/a contour in black:
m.contour(xx, yy, csurf, [100], colors="black")

# plot csurf using log color scale
m.pcolormesh(xx,yy,csurf,
             norm=colors.LogNorm(vmin=1, vmax=6e3)) # use log color scale,
                                                     # omit this to use linear
                                                     # color scale

# add a colorbar:
plt.colorbar(extend='both',
             ticks=[2, 5, 10, 20, 50, 100, 200, 500, 1000, 2000, 5000],
             format="%d")

# draw parallels and meridians. The labels argument specifies where to draw
# ticks: [left, right, top, bottom]
m.drawparallels(np.arange(-55.,90.,5.), labels = [1, 0, 0, 0])
m.drawmeridians(np.arange(-120.,30.,10.), labels = [0, 0, 0, 1])

plt.title(r"modeled surface velocity, m/year")
plt.savefig(rootname+'_csurf.png')
