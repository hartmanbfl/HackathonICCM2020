#!/bin/bash
git pull

# In production use next lines instead of 'git pull', all local changes will always be lost when using these lines
# git fetch --all
# git reset --hard origin/master

# Execute migration for database changes
php artisan migrate

php artisan config:clear
php artisan view:clear
composer update

# Genereate phpdocs
php artisan ide-helper:models -W -n

# Generate PhpStorm meta, when using PHP storm
#php artisan ide-helper:meta -n

# Only needed when using Laravel Horizon
# php artisan horizon:terminate
