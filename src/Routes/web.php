<?php

use Illuminate\Support\Facades\Route;
use Bbkdit\LaravelInstaller\Http\Controllers\InstallController;

Route::middleware(['web', 'installer.check'])->group(function () {
    Route::get('install', [InstallController::class, 'requirements'])->name('installer.requirements');
    Route::get('install/environment', [InstallController::class, 'environment'])->name('installer.environment');
    Route::post('install/save-environment', [InstallController::class, 'saveEnvironment'])->name('installer.save-environment');
    Route::get('install/database', [InstallController::class, 'database'])->name('installer.database');
    Route::post('install/run-migrations', [InstallController::class, 'runMigrations'])->name('installer.run-migrations');
    Route::get('install/finish', [InstallController::class, 'finish'])->name('installer.finish');
    Route::get('install/purchase-key', [InstallController::class, 'purchaseKey'])->name('installer.purchase-key');
    Route::post('install/verify-purchase-key', [InstallController::class, 'verifyPurchaseKey'])->name('installer.verify-purchase-key');

});
