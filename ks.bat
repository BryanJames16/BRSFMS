:: KickStart in Laravel
:: Created By Bryan James
:: A very tiny subset of PAT to help 
:: installation and diagnosis during development

@ECHO OFF
TITLE KickStart
SETLOCAL EnableDelayedExpansion

SET placedir=%~dp0
SET tempdir=%~dp0\temp

SET mariadbdir=C:\xampp\mysql\bin
SET mariadbx="%mariadbdir%\mysql.exe"
SET mariadumpx="%mariadbdir%\mysqldump.exe"
SET dbsetupdir="%~dp0\database\setup"
SET dbdumpdir="%~dp0\database\dump"
SET migratedir="%~dp0\database\migrations"

SET modeldir="%~dp0\app\Models"

SET gitdir=C:\Program Files\Git\bin
SET gitx="%gitdir%\git.exe"

SET PHPX=C:\xampp\php\php.exe

set /a LCOUNT=1

:: Set location directories
IF EXIST C:\xamppp\php\php.exe (
    SET PHPX=C:\xamppp\php\php.exe
) ELSE (
    SET PHPX=C:\xampp\php\php.exe
)

:: Start Laravel Server
IF %1==laravel (
    ECHO Starting laravel server...
    START %PHPX% artisan serve
    GOTO END
)
IF %1==lv (
    ECHO Starting laravel server...
    START %PHPX% artisan serve
    GOTO END
)

:: Start Laravel on Localhost
IF %1==localhost (
    ECHO Starting localhost server...
    START %PHPX% artisan serv --port=80
    GOTO END
)
IF %1==lh ( 
    ECHO Starting localhost server...
    START %PHPX% artisan serve --port=80
    GOTO END
)

:: Start Dumping routes
IF %1==routedump (
    ECHO Dumping %PHPX% Route List...
    %PHPX% > routelist.txt artisan route:list
    GOTO END
)
IF %1==rdump (
    ECHO Dumping %PHPX% Route List...
    %PHPX% > routelist.txt artisan route:list
    GOTO END
)

:: Status Manipulation
if %1==down (
    ECHO Setting the server down...
    %PHPX% artisan down
    GOTO END
)
if %1==up (
    ECHO Setting the server up...
    %PHPX% artisan up
    GOTO END
)

:: Git Manipulation
IF %1==git (
    IF %2==init (
        ECHO Initializing Git...
        %gitx% init
        %gitx% remote add origin https://BryanJames16@bitbucket.org/BryanJames16/mybms.git
        %gitx% remote -v
        GOTO GITCOMOK
    )

    IF %2==branch (
        ECHO Setting branch...
        %gitx% branch --set-upstream-to=origin/master master
        GOTO GITCOMOK
    )

    if %2==push (
        ECHO Pushing changes to GitHub...
        %gitx% push origin master
        GOTO GITCOMOK
    )

    if %2==pull (
        ECHO Pulling changes from GitHub...
        %gitx% pull origin master
        GOTO GITCOMOK
    )

    if %2==revert (
        ECHO Reverting changes...
        %gitx% revert %3
        GOTO GITCOMOK
    )
)

:: System Commands
if %1==build (
    if %2==models (
        ECHO "Wiping models..."
        DEL %modeldir%\*.php
        ECHO "Writing new models..."
        %PHPX% artisan code:models --schema=dbbarangay
        GOTO GITCOMOK
    )

    if %2==migrations (
        ECHO "Wiping migrations folder..."
        DEL %migratedir%\*.php
        ECHO "Writing new migrations..."
        %PHPX% artisan migrate:generate
        GOTO GITCOMOK
    )

    if %2==database (
        ECHO "Reloading detabase..."
        %mariadbx% -uroot -h127.0.0.1 --port=3307 < %dbsetupdir%\wipeinit.sql
        %mariadbx% -uroot -h127.0.0.1 --port=3307 dbBarangay < %dbdumpdir%\dbbaranggay_nightly.sql

        GOTO GITCOMOK
    )

    if %2==dump (
        ECHO "Dumping database..."
        %mariadumpx% -uroot -h127.0.0.1 --port=3307 dbBarangay > %dbdumpdir%\dbbaranggay_nightly.sql

        GOTO GITCOMOK
    )

    if %2==integrated (
        ECHO "Wiping migrations folder..."
        DEL %migratedir%\*.php
        ECHO "Writing new migrations..."
        %PHPX% artisan migrate:generate
        ECHO "Wiping models..."
        DEL %modeldir%\*.php
        ECHO "Writing new models..."
        %PHPX% artisan code:models --schema=dbbarangay
        GOTO GITCOMOK
    )

    if %2==sysback (
        ECHO "Reloading detabase..."
        %mariadbx% -uroot -h127.0.0.1 --port=3307 < %dbsetupdir%\wipeinit.sql
        %mariadbx% -uroot -h127.0.0.1 --port=3307 dbBarangay < %dbdumpdir%\dbbaranggay_nightly.sql

        ECHO "Wiping migrations folder..."
        DEL %migratedir%\*.php
        ECHO "Writing new migrations..."
        %PHPX% artisan migrate:generate

        ECHO "Wiping models..."
        DEL %modeldir%\*.php
        ECHO "Writing new models..."
        %PHPX% artisan code:models --schema=dbbarangay

        GOTO GITCOMOK
    )

    if %2==system (
        ECHO "This feature is not yet available..."
        GOTO GITCOMOK
    )
)

:NOGITCOM
ECHO INVALID GIT COMMAND!
GOTO END

:GITCOMOK
GOTO END

:COMERR
ECHO COMMAND NOT FOUND!
pause
exit

:END
ECHO Command Completed Successfully!