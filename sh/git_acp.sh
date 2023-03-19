#!/bin/bash
# DR - 17/03/2023
#
MSG="Modified at least 1 file..." 

[ "a$1" == "a" ] || MSG="$@" 

git add .
git commit -m "$MSG"
git push

