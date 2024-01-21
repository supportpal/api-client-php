#!/usr/bin/env bash
set -ex

if [ -z ${TESTSUITE+x} ]; then
  echo "Usage: TESTSUITE=unit MINCOVERAGE=100 ${BASH_SOURCE[0]##*/}"
  exit 1
fi

args=()
args+=( "--testsuite=$TESTSUITE" )
args+=( '--stop-on-failure' )
[[ "${MINCOVERAGE}" =~ ^[1-9]([0-9]+)?$ ]] && args+=( '--coverage-clover=clover.xml' )
./vendor/bin/paratest "${args[@]}"

if [[ "${MINCOVERAGE}" =~ ^[1-9]([0-9]+)?$ ]]; then
  ./vendor/bin/coverage-check clover.xml $MINCOVERAGE --only-percentage
fi
