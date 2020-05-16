<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

// ----------------------------client------------------
Route::resource('/client', 'ClientController');

// ----------------------------supplier------------------
Route::resource('/supplier', 'SupplierController');
// ----------------------------port------------------
Route::resource('/port', 'PortController');
// ----------------------------carrier------------------
Route::resource('/carrier', 'CarrierController');
// ----------------------------agent------------------
Route::resource('/agent', 'AgentController');
// ----------------------------expenses------------------
Route::resource('/expenses', 'ExpensesController');
// ----------------------------container------------------
Route::resource('/container', 'ContainerController');
// ----------------------------employee------------------
Route::resource('/employee', 'EmployeeController');
// ----------------------------bank-account------------------
Route::resource('/bank-account', 'BankAccountController');
// ----------------------------currency------------------
Route::resource('/currency', 'CurrencyController');
// ---------------------------country------------------
Route::resource('/country', 'CountryController');