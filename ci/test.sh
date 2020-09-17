#!/usr/bin/env bash
MINCOVERAGE=95
./vendor/brianium/paratest/bin/paratest --testsuite test --coverage-clover clover.xml
PERCENTAGE=$(./vendor/bin/coverage-check clover.xml $MINCOVERAGE --only-percentage)
PERCENTAGE="${PERCENTAGE//%}"
PERCENTAGE=$(printf "%.0f" $PERCENTAGE)
if [ "$MINCOVERAGE" -gt "$PERCENTAGE" ]
then
  echo "Min test coverage: $MINCOVERAGE% while current coverage $PERCENTAGE%"
  exit 1
fi
