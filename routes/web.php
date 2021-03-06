<?php

use App\Http\Controllers\PostList;
use App\Http\Livewire\Frontpage;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
    // 'accessrole',
]], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/mydashboard', function () {
        return view('mydashboard');
    })->name('mydashboard');

    Route::get('/pages', function () {
        return view('admin.pages');
    })->name('pages');

    Route::get('/navigation-menus', function () {
        return view('admin.navigation-menus');
    })->name('navigation-menus');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    Route::get('/user-permissions', function () {
        return view('admin.user-permissions');
    })->name('user-permissions');

});

Route::prefix('ots')->middleware(['auth:sanctum', 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('ots.dashboard');
    })->name('ots-dashboard');

    Route::get('/users', function () {
        return view('ots.users');
    })->name('ots-users');

    Route::get('/user-permissions', function () {
        return view('ots.user-permissions');
    })->name('ots-user-permissions');

    Route::get('/nonghyups', function () {
        return view('ots.nonghyups');
    })->name('ots-nonghyups');

    Route::get('/nonghyup-users', function () {
        return view('ots.nonghyup-users');
    })->name('ots-nonghyup-users');

    // Route::get('/post', 'Post')->naPost('post');
    Route::get('/post-list', PostList::class)->name('post-list');

    Route::get('/users-table', function () {
        return view('ots.users-tables');
    })->name('ots-users-table');

});

Route::get('/{urlslug}', Frontpage::class);
Route::get('/', Frontpage::class);
