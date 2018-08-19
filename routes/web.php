<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "<h1>Voucher vending application</h1>";
});

$router->get('/createVouchers', 'VoucherController@createVouchers'); 
$router->get('/generate', 'VoucherController@generate'); 
$router->get('/redeem', 'VoucherController@redeemVoucher');

