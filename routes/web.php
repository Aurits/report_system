<?php

use App\Livewire\AdminDashboardComponent;
use App\Livewire\ClassesComponent;
use App\Livewire\StudentsComponent;
use App\Livewire\TeachersComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';


Route::get('/admindashboard', AdminDashboardComponent::class)->name('admindashboard');
Route::get('/students', StudentsComponent::class)->name('students');
Route::get('/teachers', TeachersComponent::class)->name('teachers');
Route::get('/classes', ClassesComponent::class)->name('classes');
Route::get('/subjects', StudentsComponent::class)->name('students');
Route::get('/teachers', TeachersComponent::class)->name('teachers');
Route::get('/classes', ClassesComponent::class)->name('classes');
