#!/bin/zsh

git fetch --all
git reset --hard
git pull origin master

rm bootstrap/cache/*
rm storage/logs/*.log
rm storage/framework/cache/*
rm storage/framework/sessions/*
rm storage/framework/views/*
rm .*.*.cache
rm .*.cache

composer install
npm install
npm run dev
