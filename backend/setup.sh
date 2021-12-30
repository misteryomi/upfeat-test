#!/bin/bash

install_packages unzip git
cp -n .env.example .env
composer install
