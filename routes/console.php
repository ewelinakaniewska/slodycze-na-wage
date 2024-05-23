<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('log:clear', function() {
    exec('echo "" > storage/logs/laravel.log');
    $this->comment('Log has been cleared!');
})->describe('Clear laravel.log file');
