<?php

use App\Http\Controllers\API\APIDataController;
use Illuminate\Support\Facades\Route;

Route::get('/addData', [APIDataController::class, 'addData']);
