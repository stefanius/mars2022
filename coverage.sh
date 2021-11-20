#!/bin/zsh

phpdbg8.0 -dmemory_limit=1G -dpcov.directory=. -dpcov.enabled=1 -dpcov.exclude="~vendor~" -qrr ./vendor/bin/phpunit --coverage-html build/coverage
