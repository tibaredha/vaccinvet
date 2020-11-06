::tiba batch
:: tiba batch
::@echo off
title TIBA BATCH
mode con cols=80 lines=10
color 1F


D:

cd /wamp/www/vaccinvet/

git pull

start http://localhost/vaccinvet/

::pause > nul

exit











