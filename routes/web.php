<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


        // Role Management
    Route::livewire ('/' , 'pages::public.home-page')->name('home');

     Route::middleware(['auth', 'role:admin'])-> prefix('admin')->group (function () {
        Route::livewire('/dashboard', 'pages::admin.dashboard')->name('admin.dashboard');

        //role
        Route::livewire('/roles', 'pages::admin.role.view-role')->name('admin.roles.view');
        Route::livewire('/roles/create', 'pages::admin.role.create-role')->name('admin.roles.create');
        Route::livewire('/roles/edit/{role}', 'pages::admin.role.edit-role')->name('admin.roles.edit');
        // User Management
        Route::livewire('/users', 'pages::admin.user.user-view')->name('admin.users.view');
        Route::livewire('/users/create','pages::admin.user.user-create')->name('admin.users.create');
        Route::livewire('/users/edit/{user}', 'pages::admin.user.user-edit')->name('admin.users.edit');
    });
      //user
      Route::livewire('/users', 'pages::admin.user.user-view')->name('admin.users.view');
      Route::livewire('/users/create','pages::admin.user.user-create')->name('admin.users.create');
      Route::livewire('/users/edit/{user}', 'pages::admin.user.user-edit')->name('admin.users.edit');

    // --- OWNER GROUP ---
    Route::middleware('auth','role:owner')->prefix('owner')->group(function () {
        Route::livewire('/dashboard', 'pages::owner.dashboard')->name('owner.dashboard');

            Route::livewire('/', 'pages::owner.employee.view-employee')->name('owner.employees.view');
            Route::livewire('/create', 'pages::owner.employee.create-employee')->name('owner.employees.create');
            Route::livewire('/edit/{user}', 'pages::owner.employee.edit-employee')->name('owner.employees.edit');
        });

     Route::middleware(['auth', 'role:employee'])->prefix('employee')->group(function () {
        Route::livewire('/dashboard', 'pages::employee.dashboard')->name('employee.dashboard');
     });

     Route::livewire ('/login', 'auth::login')->name('login');
