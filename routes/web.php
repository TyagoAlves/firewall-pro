<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/features', [SiteController::class, 'features'])->name('features');
Route::get('/documentation', [SiteController::class, 'documentation'])->name('documentation');
Route::get('/pricing', [SiteController::class, 'pricing'])->name('pricing');
Route::get('/security', [SiteController::class, 'security'])->name('security');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/rules', [RuleController::class, 'index'])->name('rules.index');
    Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
    Route::post('/rules', [RuleController::class, 'store'])->name('rules.store');
    Route::get('/rules/{rule}/edit', [RuleController::class, 'edit'])->name('rules.edit');
    Route::put('/rules/{rule}', [RuleController::class, 'update'])->name('rules.update');
    Route::patch('/rules/{rule}/toggle', [RuleController::class, 'toggle'])->name('rules.toggle');
    Route::delete('/rules/{rule}', [RuleController::class, 'destroy'])->name('rules.destroy');
    Route::get('/rules/{rule}/iptables', [RuleController::class, 'iptables'])->name('rules.iptables');
    Route::get('/generate-iptables', [RuleController::class, 'generateIptables'])->name('rules.generate');
    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
