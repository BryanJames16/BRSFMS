KS command list:

ks lv / ks laravel              -   starts system on laravel server
ks lh / ks localhost            -   starts system on localhost server
ks rdump / ks routedump         -   dumps routelist to root directory
ks down                         -   sets system down (maintenance mode)
ks up                           -   sets system up

ks git init                     -   initializes repository with essential system scm
ks git branch                   -   sets branch upsteam to "master"
ks git push                     -   equivalent to "git push"
ks git pull                     -   equivalent to "git pull"
ks git revert [commit]          -   reverts back changes to specific commit serial

ks build migrations             -   wipes and writes new migrations
ks build models                 -   wipes and writes new models
ks build database               -   wipes database and restores database from nightly dump
ks build integrated             -   wipes and writes new migrations and models
ks build sysback                -   wipes and builds system backend (database, migration, model)
ks build system                 -   builds system distribution <NOT YET IMPLEMENTED>

ks database dump                -   dumps the whole database as nightly dump
ks database structure           -   dumps the database strcuture only (no data)
ks database data                -   dumps the database data only (no structure)
ks database wipe                -   wipes the whole database
ks database rest                -   restores database from nightly dump without wiping
ks database createmodelfactory  -   creates model factory in development <NOT YET IMPLEMENTED>
ks database createseeds         -   create database seeds in development <NOT YET IMPLEMENTED>
ks database executeinit         -   Executes initialization script
ks database executestructure    -   Restores database structure dump only
ks database executedata         -   Restores database data dump only
ks database executeseed         -   runs database seeder 
ks database executefactory      -   runs model factory <NOT YET IMPLEMENTED>
