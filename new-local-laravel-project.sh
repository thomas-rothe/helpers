#!/bin/bash

############## Colors ##############
RCol='\e[0m'    # Text Reset
# Regular           Bold                Underline           High Intensity      BoldHigh Intens     Background          High Intensity Backgrounds
Bla='\e[0;30m';     BBla='\e[1;30m';    UBla='\e[4;30m';    IBla='\e[0;90m';    BIBla='\e[1;90m';   On_Bla='\e[40m';    On_IBla='\e[0;100m';
Red='\e[0;31m';     BRed='\e[1;31m';    URed='\e[4;31m';    IRed='\e[0;91m';    BIRed='\e[1;91m';   On_Red='\e[41m';    On_IRed='\e[0;101m';
Gre='\e[0;32m';     BGre='\e[1;32m';    UGre='\e[4;32m';    IGre='\e[0;92m';    BIGre='\e[1;92m';   On_Gre='\e[42m';    On_IGre='\e[0;102m';
Yel='\e[0;33m';     BYel='\e[1;33m';    UYel='\e[4;33m';    IYel='\e[0;93m';    BIYel='\e[1;93m';   On_Yel='\e[43m';    On_IYel='\e[0;103m';
Blu='\e[0;34m';     BBlu='\e[1;34m';    UBlu='\e[4;34m';    IBlu='\e[0;94m';    BIBlu='\e[1;94m';   On_Blu='\e[44m';    On_IBlu='\e[0;104m';
Pur='\e[0;35m';     BPur='\e[1;35m';    UPur='\e[4;35m';    IPur='\e[0;95m';    BIPur='\e[1;95m';   On_Pur='\e[45m';    On_IPur='\e[0;105m';
Cya='\e[0;36m';     BCya='\e[1;36m';    UCya='\e[4;36m';    ICya='\e[0;96m';    BICya='\e[1;96m';   On_Cya='\e[46m';    On_ICya='\e[0;106m';
Whi='\e[0;37m';     BWhi='\e[1;37m';    UWhi='\e[4;37m';    IWhi='\e[0;97m';    BIWhi='\e[1;97m';   On_Whi='\e[47m';    On_IWhi='\e[0;107m';

############## Basic settings ##############
# Programname
PROGRAMNAME=`basename "$0"`
DEBUG_MODE="0"
DIRECTORY_SEPERATOR="/"

############## Debug mode specific ##############
if [ $DEBUG_MODE -eq "0" ]
  then
    rm -R /home/michael/Schreibtisch/LARAVELTESTING/*
fi

############## Functions ##############
errorAndExit() {
  ERROR_MESSAGE=$1
  printf "\t${Red}Error: $ERROR_MESSAGE${Whi}\n"
  exit 1
}
errorMessage() {
  ERROR_MESSAGE=$1
  printf "\t${Red}$ERROR_MESSAGE\n${Whi}"
}
messageSuccess() {
  MESSAGE=$1
  printf "${Gre}\tSuccess: $MESSAGE\n${Whi}"
}
cmdErrorMessage() {
  ERROR_MESSAGE=$1
  printf "\t${Red}Returned error message:\n${Pur}$ERROR_MESSAGE\n"
}
usage() {
  errorMessage "$1"
  printf "${Blu}\tUsage:"
  printf "\n\t   $PROGRAMNAME path/to/my/new/project/"
  printf "\n\t   $PROGRAMNAME /var/www/htdocs/"
  printf "\n\t   $PROGRAMNAME /c/xampp/htdocs/\n${Whi}"
  exit 1
}
prompt() {
  QUESTION=$1
  DEFAULT=$2
  printf "${Whi}\n$QUESTION [${Gre}$DEFAULT${Whi}]: "
}
messageStart() {
  MESSAGE=$1
  printf "${Blu}\n\t$MESSAGE ...\n${Whi}"
}
cmdPrintResult() {
  CMD=$1
  CMD_EXIT_STATUS=$2
  CMD_ERROR_MESSAGE=$3
  if [ $CMD_EXIT_STATUS -eq 0 ]; then
      messageSuccess "$CMD"
  else
      errorMessage "Command failed: $CMD"
      cmdErrorMessage "Error message: $CMD_ERROR_MESSAGE"
      exit 1
  fi
}
cmd() {
  CMD=$1
  CMD_ERROR_MESSAGE=$($CMD 2>>/dev/null 2>&1)
  CMD_EXIT_STATUS=$?
  cmdPrintResult "$CMD" "$CMD_EXIT_STATUS" "$CMD_ERROR_MESSAGE"
}
cmdVerbose() {
  CMD=$1
  OUTPUT=$($CMD)
  CMD_EXIT_STATUS=$?
  if [ $CMD_EXIT_STATUS -eq 0 ]; then
      messageSuccess "$OUTPUT"
  else
      errorMessage "Command failed: $CMD"
      cmdErrorMessage "Error message: $OUTPUT"
      exit 1
  fi
}
isDirectory() {
  TESTED_INPUT=$1
  if [ -d $TESTED_INPUT ]
    then
      if [ -L t ]
        then return 1
        else return 0
      fi
    else
      return 1
  fi
}
fileExists() {
  TESTED_INPUT=$1
  if [ -e $TESTED_INPUT ]
    then return 0
    else return 1
  fi
}
############## Settings ##############
# Argument count
if [ $# -eq 0 ]; then
    usage "Argument missing: no path provided"
fi

# Projectpath
isDirectory $1
IS_DIR=$?
if [ ! "$IS_DIR" -eq "0" ]; then
  usage "False argument: path \"$1\" does not exist"
fi
PROJECT_PATH=$1

# Projectname
PROJECT_NAME_DEFAULT="laravel-skeleton"
prompt  "Projektname" $PROJECT_NAME_DEFAULT
read -r PROJECT_NAME
if [[ -z "$PROJECT_NAME" ]]
  then
    PROJECT_NAME=$PROJECT_NAME_DEFAULT
fi

# Full projectname
FULL_PROJECT_NAME=$PROJECT_PATH$PROJECT_NAME

# Project directory
PROJECT_DIRECTORY=$FULL_PROJECT_NAME$DIRECTORY_SEPERATOR

############## Composer: create-project ##############
messageStart "Composer installs Laravel to \"$FULL_PROJECT_NAME\""
cmd "composer create-project laravel/laravel $FULL_PROJECT_NAME"

############## Laravel specific ##############
LARAVEL_ENV="${PROJECT_DIRECTORY}.env"
LARAVEL_ENV_EXAMPLE="${PROJECT_DIRECTORY}.env.example"
ARTISAN=${PROJECT_DIRECTORY}artisan

# Display version
messageStart "Displaying installed version of Laravel"
cmdVerbose "php $ARTISAN --version"

# copy .env.example to .env
messageStart "Copying \".env.example\" to \".env\""
fileExists $LARAVEL_ENV
FILE_EXISTS=$?
if [ ! "$FILE_EXISTS" -eq "0" ]
  then
    fileExists $LARAVEL_ENV_EXAMPLE
    FILE_EXISTS=$?
    if [ "$FILE_EXISTS" -eq "0" ]
      then
        cmd "cp $LARAVEL_ENV_EXAMPLE $LARAVEL_ENV"
      else
        errorMessage "File \".env.example\" not found."
    fi
  else messageSuccess "File \".env\" already exists."
fi

# Set application key
messageStart "Setting application key"
cmd "php $ARTISAN key:generate"

# [DEPRECATED] Run optimize script
#messageStart "Running optimize script"
#cmd "php $ARTISAN optimize"

# Create a symbolic link from "public/storage" to "storage/app/public"
messageStart "Creating a symbolic link from \"public/storage\" to \"storage/app/public\""
cmd "php $ARTISAN storage:link"

############## DB ##############
# DB name
DB_NAME_DEFAULT=$PROJECT_NAME
prompt  "DB name " $DB_NAME_DEFAULT
read -r DB_NAME
if [[ -z "$DB_NAME" ]]
  then
    DB_NAME=$DB_NAME_DEFAULT
fi

# DB user
DB_USER_DEFAULT="root"
prompt  "DB user " $DB_USER_DEFAULT
read -r DB_USER
if [[ -z "$DB_USER" ]]
  then
    DB_USER=$DB_USER_DEFAULT
fi

# DB password
DB_PASSWORD_DEFAULT=""
prompt  "DB password " $DB_PASSWORD_DEFAULT
read -r DB_PASSWORD
if [[ -z "$DB_PASSWORD" ]]
  then
    DB_PW=$DB_PASSWORD_DEFAULT
fi

# Create DB
messageStart "Creating a symbolic link from \"public/storage\" to \"storage/app/public\""
cmd "CREATE DATABASE $DB_NAME" | mysql -u$DB_USER -p$DB_PASSWORD"

# Return success
exit 0
