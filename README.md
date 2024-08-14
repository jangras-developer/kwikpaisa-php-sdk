# KwikPaisa PHP SDK Integration Guide

# Overview
This guide provides instructions for integrating the KwikPaisa PHP SDK into your Laravel application. You can choose between downloading the SDK package or installing it via Composer. Additionally, the guide covers setting up the configuration files and using the SDK in your Laravel controllers.


## Installation
# Option 1: Download the Package File
## Download the Package:
Download the latest version of the kwikpaisa-php-packages.zip file from the KwikPaisa website or repository.

## Extract the Package:
Unzip the kwikpaisa-php-packages.zip file to extract the SDK and its dependencies.

## Include the SDK in Your Project:
Copy the extracted kwikpaisa folder into your project’s directory. For example, place it in the packages folder.

## Autoload the SDK:
Update your composer.json file to include the following autoload configuration:
JSON

"autoload": {
    "psr-4": {
        "Jangras\\Kwikpaisa\\": "path/to/kwikpaisa/src/"
    }
}

Replace "path/to/kwikpaisa/src/" with the actual path where you copied the kwikpaisa folder.

## Update Composer Autoload:
Run the following command to regenerate the Composer autoload files:
```bash
composer require jangras/kwikpaisa

## Clear Laravel's Configuration and Cache:
Run these Artisan commands to ensure Laravel picks up the new changes:
php artisan config:clear
php artisan cache:clear

## Initialize and Use the SDK:
Initialize the SDK in your code as described in the SDK documentation and start using it.



# Option 2: Install via Composer
## Require the SDK:
Execute the following Composer command to install the KwikPaisa SDK:
composer require jangras/kwikpaisa-sdk

## Composer Installation:
Composer will automatically download and install the SDK and its dependencies.

## Autoloading:
Composer will handle autoloading of SDK classes, so no additional autoload configuration is necessary.

## Clear Laravel's Configuration and Cache:
Run these Artisan commands to ensure Laravel picks up the new changes:
php artisan config:clear
php artisan cache:clear
Initialize and Use the SDK:

## After installation, initialize the SDK in your code as described in the SDK documentation and start using it.


## To get sample code and uses of KwikPaisa NEO Bank - PG SDK refer
https://kwikpaisa-neo-bank.readme.io/reference/kwikpaisas-php-sdk 
