<?php


use App\Http\Controllers\Admin\Campaign\AdminCampaignController;
use Illuminate\Support\Facades\Route;



Route::prefix( 'campaigns')
     ->controller( AdminCampaignController::class)
     ->group(function () {

         Route::post('store', 'store');

});
