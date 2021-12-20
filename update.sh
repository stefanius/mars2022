#!/bin/zsh

git fetch --all
git reset --hard
git checkout master
git pull origin master


rm -rf bootstrap/cache/*
rm -rf storage/logs/*.log
rm -rf storage/framework/cache/*
rm -rf storage/framework/sessions/*
rm -rf storage/framework/views/*
rm -rf .*.*.cache
rm -rf .*.cache

composer install
npm install
npm run dev
