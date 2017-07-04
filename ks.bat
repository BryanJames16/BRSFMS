:: KickStart in Laravel
:: Created By Bryan James
:: A very tiny subset of PAT to help 
:: installation and diagnosis during development

@ECHO OFF
TITLE KickStart
SET placedir="%~dp0"
SET gitdir=C:\Program Files\Git\bin
SET gitx="%gitdir%\git.exe"

:: Start Laravel Server
IF %1==laravel (
    ECHO Starting laravel server...
    START php artisan serv
    GOTO END
)
IF %1==lv (
    ECHO Starting laravel server...
    START php artisan serv
    GOTO END
)

:: Start Laravel on Localhost
IF %1==localhost (
    ECHO Starting localhost server...
    START php artisan serv --port=80
    GOTO END
)
IF %1==lh ( 
    ECHO Starting localhost server...
    START php artisan serv --port=80
    GOTO END
)

:: Start Dumping routes
IF %1==routedump (
    ECHO Dumping PHP Route List...
    php > routelist.txt artisan route:list
    GOTO END
)
IF %1==rdump (
    ECHO Dumping PHP Route List...
    php > routelist.txt artisan route:list
    GOTO END
)

if %1==down (
    ECHO Setting the server down...
    php artisan down
    GOTO END
)
if %1==up (
    ECHO Setting the server up...
    php artisan up
    GOTO END
)

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