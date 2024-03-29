<?php

use App\Http\Controllers\Api\V1\FindVideoAuditController;
use App\Http\Controllers\Api\V1\FindVideoController;
use App\Http\Controllers\Api\V1\GetAllSearchTermsController;
use App\Http\Controllers\Api\V1\GetAllVideosController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\LogoutController;
use App\Http\Controllers\Api\V1\RegisterController;
use Illuminate\Routing\Router;
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

Route::prefix('v1')->group(function (Router $router) {
    $router->post('login', LoginController::class);
    $router->post('register', RegisterController::class);
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function (Router $router) {
    $router->post('logout', LogoutController::class);
    $router->get('videos', GetAllVideosController::class);
    $router->get('videos/{id}/audits', FindVideoAuditController::class);
    $router->get('videos/{id}', FindVideoController::class);
    $router->get('search-terms', GetAllSearchTermsController::class);
});
