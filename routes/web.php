<?php

use Uretral\MultiLanguage\Http\Controllers\MultiLanguageController;
use Uretral\MultiLanguage\MultiLanguage;

Route::post('/locale', MultiLanguageController::class.'@locale');
Route::post('/country', MultiLanguageController::class.'@country');
Route::post('/module', MultiLanguageController::class.'@module');
if(MultiLanguage::config("show-login-page", true)) {
    Route::get('auth/login', MultiLanguageController::class.'@getLogin');
}
