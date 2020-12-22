<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\EmailController;
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
    return view('welcome');
});

//Contacts
Route ::post('/contacts', [ContactController::class,'store']);
Route ::get('/contacts', [ContactController::class, 'index']);
Route ::get('/contacts/create', [ContactController::class, 'create']);
Route ::put('/contacts/{contact}', [ContactController::class, 'update']);
Route ::delete('/contacts/{contact}', [ContactController::class, 'destroy']);
Route ::get('/contacts/{contact}', [ContactController::class, 'show']) -> name('contact.show');
Route ::get('/contacts/{contact}/edit', [ContactController::class, 'edit']);

//Emails
Route ::post('/emails', [EmailController::class,'store']);
Route ::get('/emails', [EmailController::class, 'index']);
Route ::get('/emails/create', [EmailController::class, 'create']);
Route ::put('/emails/{email}', [EmailController::class, 'update']);
Route ::delete('/emails/{email}', [EmailController::class, 'destroy']);
Route ::get('/emails/{email}', [EmailController::class, 'show']) -> name('emails.show');
Route ::get('/emails/{email}/edit', [EmailController::class, 'edit']);

//Phones
Route ::post('/phones', [PhoneController::class,'store']);
Route ::get('/phones', [PhoneController::class, 'index']);
Route ::get('/phones/create', [PhoneController::class, 'create']);
Route ::put('/phones/{phone}', [PhoneController::class, 'update']);
Route ::delete('/phones/{phone}', [PhoneController::class, 'destroy']);
Route ::get('/phones/{phone}', [PhoneController::class, 'show']) -> name('phones.show');
Route ::get('/phones/{phone}/edit', [PhoneController::class, 'edit']);
