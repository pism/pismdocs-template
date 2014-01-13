#!/bin/bash

rm -f performance.sh

echo "#!/bin/bash" >> performance.sh
echo >> performance.sh

for GRID in 40 20 10 5 3 2 ; do
   PISM_DO=echo NODIAGS=1 ./spinup.sh 4 const 100 $GRID hybrid perf${GRID}.nc \
      | tail -n 1 >> performance.sh
   echo >> performance.sh
done
