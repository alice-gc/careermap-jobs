<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('content/options');

});
Route::get('/dashboard', function () {
    return view('content/options');
});


//Job CRUD functions

// get all jobs
Route::get('/jobs', [JobController::class, 'index'])->name('job.index');

// get job by ID
Route::get('/jobs/{id}', [JobController::class, 'getJobByIndex'])->name('job.get');

// create new job
Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job', [JobController::class, 'store'])->name('job.store');