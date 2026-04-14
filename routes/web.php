<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- PUBLIC ROUTES ---
Route::livewire('/', 'pages::public.home-page')->name('home');
Route::livewire('/login', 'auth::login')->name('login');

// --- AUTH ACTIONS ---
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// --- ADMIN GROUP ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::livewire('/dashboard', 'pages::admin.dashboard')->name('admin.dashboard');
    Route::livewire('/roles', 'pages::admin.role.view-role')->name('admin.roles.view');
    Route::livewire('/roles/create', 'pages::admin.role.create-role')->name('admin.roles.create');
    Route::livewire('/roles/edit/{role}', 'pages::admin.role.edit-role')->name('admin.roles.edit');
    Route::livewire('/users', 'pages::admin.user.user-view')->name('admin.users.view');
    Route::livewire('/users/create','pages::admin.user.user-create')->name('admin.users.create');
    Route::livewire('/users/edit/{user}', 'pages::admin.user.user-edit')->name('admin.users.edit');
});

// --- OWNER GROUP ---
Route::middleware(['auth', 'owner'])->prefix('owner')->group(function () {
    Route::livewire('/dashboard', 'pages::owner.dashboard')->name('owner.dashboard');
    Route::prefix('employees')->group(function () {
        Route::livewire('/', 'pages::owner.employee.view-employee')->name('owner.employees.view');
        Route::livewire('/create', 'pages::owner.employee.create-employee')->name('owner.employees.create');
        Route::livewire('/edit/{user}', 'pages::owner.employee.edit-employee')->name('owner.employees.edit');
    });
});

// --- EMPLOYEE GROUP ---
Route::middleware(['auth', 'employee'])->prefix('employee')->group(function () {
    Route::livewire('/dashboard', 'pages::employee.dashboard')->name('employee.dashboard');
});