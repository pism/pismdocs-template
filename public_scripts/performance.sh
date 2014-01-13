#!/bin/bash

mpiexec -n 4 pismr -boot_file pism_Greenland_5km_v1.1.nc -Mx 38 -My 71 -Mz 101 -Mbz 11 -z_spacing equal -Lz 4000 -Lbz 2000 -skip -skip_max 10 -ys -100 -ye 0 -surface given -surface_given_file pism_Greenland_5km_v1.1.nc -ocean_kill pism_Greenland_5km_v1.1.nc -sia_e 3.0 -ssa_sliding -topg_to_phi 15.0,40.0,-300.0,700.0 -pseudo_plastic -pseudo_plastic_q 0.25 -till_effective_fraction_overburden 0.02 -tauc_slippery_grounding_lines -o perf40.nc

mpiexec -n 4 pismr -boot_file pism_Greenland_5km_v1.1.nc -Mx 76 -My 141 -Mz 101 -Mbz 11 -z_spacing equal -Lz 4000 -Lbz 2000 -skip -skip_max 10 -ys -100 -ye 0 -surface given -surface_given_file pism_Greenland_5km_v1.1.nc -ocean_kill pism_Greenland_5km_v1.1.nc -sia_e 3.0 -ssa_sliding -topg_to_phi 15.0,40.0,-300.0,700.0 -pseudo_plastic -pseudo_plastic_q 0.25 -till_effective_fraction_overburden 0.02 -tauc_slippery_grounding_lines -o perf20.nc

mpiexec -n 4 pismr -boot_file pism_Greenland_5km_v1.1.nc -Mx 151 -My 281 -Mz 101 -Mbz 11 -z_spacing equal -Lz 4000 -Lbz 2000 -skip -skip_max 20 -ys -100 -ye 0 -surface given -surface_given_file pism_Greenland_5km_v1.1.nc -ocean_kill pism_Greenland_5km_v1.1.nc -sia_e 3.0 -ssa_sliding -topg_to_phi 15.0,40.0,-300.0,700.0 -pseudo_plastic -pseudo_plastic_q 0.25 -till_effective_fraction_overburden 0.02 -tauc_slippery_grounding_lines -o perf10.nc

mpiexec -n 4 pismr -boot_file pism_Greenland_5km_v1.1.nc -Mx 301 -My 561 -Mz 101 -Mbz 11 -z_spacing equal -Lz 4000 -Lbz 2000 -skip -skip_max 20 -ys -100 -ye 0 -surface given -surface_given_file pism_Greenland_5km_v1.1.nc -ocean_kill pism_Greenland_5km_v1.1.nc -sia_e 3.0 -ssa_sliding -topg_to_phi 15.0,40.0,-300.0,700.0 -pseudo_plastic -pseudo_plastic_q 0.25 -till_effective_fraction_overburden 0.02 -tauc_slippery_grounding_lines -o perf5.nc

mpiexec -n 4 pismr -boot_file pism_Greenland_5km_v1.1.nc -Mx 501 -My 934 -Mz 101 -Mbz 11 -z_spacing equal -Lz 4000 -Lbz 2000 -skip -skip_max 50 -ys -100 -ye 0 -surface given -surface_given_file pism_Greenland_5km_v1.1.nc -ocean_kill pism_Greenland_5km_v1.1.nc -sia_e 3.0 -ssa_sliding -topg_to_phi 15.0,40.0,-300.0,700.0 -pseudo_plastic -pseudo_plastic_q 0.25 -till_effective_fraction_overburden 0.02 -tauc_slippery_grounding_lines -o perf3.nc

exit

mpiexec -n 4 pismr -boot_file pism_Greenland_5km_v1.1.nc -Mx 750 -My 1400 -Mz 101 -Mbz 11 -z_spacing equal -Lz 4000 -Lbz 2000 -skip -skip_max 50 -ys -100 -ye 0 -surface given -surface_given_file pism_Greenland_5km_v1.1.nc -ocean_kill pism_Greenland_5km_v1.1.nc -sia_e 3.0 -ssa_sliding -topg_to_phi 15.0,40.0,-300.0,700.0 -pseudo_plastic -pseudo_plastic_q 0.25 -till_effective_fraction_overburden 0.02 -tauc_slippery_grounding_lines -o perf2.nc
