@echo off

rem *************************************************************
rem ** symfony CLI for Windows based systems (based on phing.bat)
rem *************************************************************

rem This script will do the following:
rem - check for PHP_COMMAND env, if found, use it.
rem   - if not found detect php, if found use it, otherwise err and terminate

if "%OS%"=="Windows_NT" @setlocal

rem %~dp0 is expanded pathname of the current script under NT
set SCRIPT_DIR=%~dp0

goto start

:start

if "%PHP_COMMAND%" == "" goto no_phpcommand

IF EXIST ".\sf" (
  %PHP_COMMAND% ".\sf" %*
) ELSE (
  %PHP_COMMAND% "%SCRIPT_DIR%\sf" %*
)
goto cleanup

:no_phpcommand
rem echo ------------------------------------------------------------------------
rem echo WARNING: Set environment var PHP_COMMAND to the location of your php.exe
rem echo          executable (e.g. C:\PHP\php.exe).  (assuming php.exe on PATH)
rem echo ------------------------------------------------------------------------
set PHP_COMMAND=php.exe
goto start

:cleanup
if "%OS%"=="Windows_NT" @endlocal
rem pause
