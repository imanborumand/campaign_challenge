<?php


use App\Http\Controllers\Admin\Gift\AdminGiftCardController;
use Illuminate\Support\Facades\Route;



Route::prefix( 'gift')
     ->controller( AdminGiftCardController::class)
     ->group(function () {

         Route::post('store', 'store');

});
