<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/ovos', function (Request $request) {
    return $request->user();
});


Route::post("/login", [LoginController::class, "login"]);

Route::get("/aluno/{aluno}", [AlunoController::class, "show"]);
Route::get("/alunos", [AlunoController::class, "index"]);

Route::post("/novo_aluno", [AlunoController::class, "create"]);

Route::delete("/excluir/aluno/{aluno_id}", [AlunoController::class, "destroy"]);