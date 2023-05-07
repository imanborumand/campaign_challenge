<?php

use App\Http\Controllers\Api\Campaign\ApiCampaignController;
use App\Http\Controllers\Api\Wallet\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix( 'campaigns')
     ->controller( ApiCampaignController::class)
     ->group(function () {

         Route::post('participation', 'participationToCampaign');

});


Route::prefix( 'users')
     ->group(function () {



         Route::prefix( 'wallet')
             ->controller( WalletController::class)
              ->group(function () {

                  Route::get('balance/{mobile}', 'balance');
         });

});
