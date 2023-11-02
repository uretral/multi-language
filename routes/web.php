<?php

use Uretral\MultiLanguage\Http\Controllers\MultiLanguageController;
use Uretral\MultiLanguage\MultiLanguage;

Route::post('/locale', MultiLanguageController::class.'@locale');
if(MultiLanguage::config("show-login-page", true)) {
    Route::get('auth/login', MultiLanguageController::class.'@getLogin');
}
