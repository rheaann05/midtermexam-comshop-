<?php

use Illuminate\Support\Facades\Route;


    Route::livewire ('/' , 'pages::public.home-page')->name('home');  
    
     Route::middleware(['auth', 'role:admin'])-> prefix('admin')->group (function () {
        Route::livewire('/dashboard', 'pages::admin.dashboard')->name('admin.dashboard');

        //role 
        Route::livewire('/roles', 'pages::admin.role.view-role')->name('admin.roles.view');
        Route::livewire('/roles/create', 'pages::admin.role.create-role')->name('admin.roles.create');
        Route::livewire('/roles/edit/{role}', 'pages::admin.role.edit-role')->name('admin.roles.edit');

      //user 
      Route::livewire('/users', 'pages::admin.user.user-view')->name('admin.users.view');
      Route::livewire('/users/create','pages::admin.user.user-create')->name('admin.users.create');
      Route::livewire('/users/edit/{user}', 'pages::admin.user.user-edit')->name('admin.users.edit');


     }); 

     Route::livewire ('/login', 'auth::login')->name('login'); 
     
