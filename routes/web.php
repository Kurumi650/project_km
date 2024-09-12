<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoertuigController;

// Hier zijn get route
Route::get('/', [VoertuigController::class, 'index']);
Route::get('/voertuig_toevogen', [VoertuigController::class, 'voertuig_toevogen']);
Route::get('/rit_toevogen', [VoertuigController::class, 'rit_toevogen']);
Route::get('/voertuigen/{id}/edit_voertuig', [VoertuigController::class, 'edit_voertuig']);
Route::get('/rit_overzicht', [VoertuigController::class, 'rit_overzicht']);
Route::get('/info', [VoertuigController::class, 'info']);

// Hier wordt put route 
Route:: put('/voertuig_opslaan/{id}', [VoertuigController::class, 'update']);

// Hier wordt post route 
Route::post('/rit_opslaan', [VoertuigController::class, 'rit_opslaan']);
Route::post('/voertuig_opslaan', [VoertuigController::class, 'voertuig_opslaan']);

//Hier wordt delete route
Route::delete('/voertuigen/{id}', [VoertuigController::class, 'delete'])->name('voertuigen.delete');