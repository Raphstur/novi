<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SignalementController;
use App\Http\Controllers\TemoinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\PreuveController;
use Illuminate\Support\Facades\Auth;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ressources', function () { return view('ressources'); })->name('ressources');
Route::get('/statistiques', function () { return view('statistiques'); })->name('statistiques');
Route::get('/information', function () { return view('information'); })->name('information');
Route::get('/serv', [\App\Http\Controllers\AuthorityController::class, 'index'])->name('serv');

// Contact
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'submit')->name('contact.submit');
});

// Signalement
Route::get('/signalement', [SignalementController::class, 'create'])->name('signalement.create');
Route::post('/signalement', [SignalementController::class, 'store'])->name('signalement.store');
Route::get('/signalement/confirmation', function () { return view('signalement.confirmation'); })->name('signalement.confirmation');
Route::get('/signalement/recherche', function () { return view('signalement.recherche'); })->name('signalement.recherche');
Route::post('/signalement/recherche', [SignalementController::class, 'showByCode'])->name('signalement.showByCode');
Route::get('/signalement', [SignalementController::class, 'create'])->name('signalement');

// Page dédiée pour afficher le code de suivi après signalement
Route::get('/code-suivi/{code}', [SignalementController::class, 'showTrackingCode'])
     ->name('code.suivi');

// Suivi
Route::get('/suivi', [SignalementController::class, 'showByCode'])->name('suivi');
Route::post('/suivi', [SignalementController::class, 'showByCode'])->name('suivi.search');
Route::get('/suivi/{code}', [SignalementController::class, 'showByCode'])->name('suivi.show');

// Témoin
Route::get('/temoin', [TemoinController::class, 'create'])->name('temoin.create');
Route::post('/temoin', [TemoinController::class, 'store'])->name('temoin.store');

// Authentification
Route::get('/login', function() { return view('auth.login'); })->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('/login/partner', function() { return view('auth.login-partner'); })->name('login.partner');
Route::post('/login/partner', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'loginPartner']);
Route::get('/login/autorite', function() { return view('auth.login-autorite'); })->name('login.autorite');
Route::post('/login/autorite', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'loginAutorite']);

// Inscription partenaires/autorités
Route::get('/inscription/partenaire', function () {
    return view('auth.partner_registration');
})->name('partner.register');

Route::post('/inscription/partenaire', [PartnerController::class, 'register'])
     ->name('partner.register.submit');

Route::get('/inscription/autorite', function () { return view('auth.authority_registration'); })->name('authority.register');
Route::post('/inscription/autorite', [AuthorityController::class, 'register'])->name('authority.register.submit');

// Routes protégées
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    // Tableau de bord admin
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('bordo');
        Route::post('/validate-partner/{id}', [AdminController::class, 'validatePartner'])
             ->name('admin.validate_partner');
        Route::post('/reject-partner/{id}', [AdminController::class, 'rejectPartner'])
             ->name('admin.reject_partner');
        Route::post('/validate_autorite/{id}', [App\Http\Controllers\AdminController::class, 'validateAutorite'])->name('admin.validate_autorite');
    });

    // Partner routes
    Route::middleware(['auth', 'partner.status', 'role:partner'])->prefix('partner')->group(function () {
        Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
        Route::post('/notify', [PartnerController::class, 'notifyAdmin'])->name('partner.notify');
        Route::post('/report', [PartnerController::class, 'submitReport'])->name('partner.report');
    });

    // Authority routes
    Route::middleware(['role:authority'])->prefix('authority')->group(function () {
        Route::get('/dashboard', [AuthorityController::class, 'dashboard'])->name('authority.dashboard');
        Route::post('/report', [AuthorityController::class, 'submitReport'])->name('authority.report');
    });
});

Route::get('/partner/dashboard', function() { return view('partner.dashboard'); })->name('partner.dashboard');
Route::get('/authority/dashboard', function() { return view('authority.dashboard'); })->name('authority.dashboard');

Route::get('/register/partner', [PartnerController::class, 'showRegistrationForm'])
     ->name('partner.register.form');

Route::post('/register/partner', [PartnerController::class, 'register'])
     ->name('partner.register');
Route::get('/partenaire/register', [PartnerController::class, 'showRegistrationForm'])->name('partner.register.form');
Route::post('/partenaire/register', [PartnerController::class, 'register'])->name('partner.register');

// Route pour mettre à jour le statut d'un signalement
Route::put('/signalement/{id}/statut', [SignalementController::class, 'updateStatut'])->name('signalement.updateStatut');

// Route pour supprimer un signalement
Route::delete('/signalement/{id}', [SignalementController::class, 'destroy'])->name('signalement.delete');

// Route pour supprimer un utilisateur
Route::delete('/utilisateur/{id}', [App\Http\Controllers\UtilisateurController::class, 'destroy'])->name('utilisateur.delete');

// Route pour transmettre un signalement
Route::post('/signalement/{id}/transmettre', [SignalementController::class, 'transmettre'])->name('signalement.transmettre');