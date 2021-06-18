<?php

use App\Http\Controllers\LoginCntroller;
use App\Http\Livewire\Bayar;
use App\Http\Livewire\DashboardAdmin;
use App\Http\Livewire\DashboardUser;
use App\Http\Livewire\DataAdmin;
use App\Http\Livewire\InputTagihanAdmin;
use App\Http\Livewire\Konfimasi;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\TambahUser;
use App\Http\Livewire\UpdateStatus;
use App\Http\Livewire\UserKeluarAdmin;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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
Route::get('/',function(){
    return view('login');
})->name('login');
Route::group(['middleware'=>['auth','role:1']],function () {
    Route::get('/dashboard', DashboardAdmin::class);
    Route::get('/data',DataAdmin::class);
    Route::get('/userkeluar', UserKeluarAdmin::class);
    Route::get('/input', InputTagihanAdmin::class);    
    Route::get('logout',Logout::class);
    Route::get('/bayar/{id}',Bayar::class);
    Route::get('/tambahuser',TambahUser::class);
    Route::get('/konfirmasi/{$id}',Konfimasi::class);
});
Route::group(['middleware'=>['auth','role:2']],function(){
    Route::get('/home',DashboardUser::class);
    
});