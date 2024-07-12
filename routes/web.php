<?php

use App\Livewire\AdminDashboardComponent;
use App\Livewire\ClassesComponent;
use App\Livewire\ExamsComponent;
use App\Livewire\MarksComponent;
use App\Livewire\ReportsComponent;
use App\Livewire\SettingsComponent;
use App\Livewire\StudentsComponent;
use App\Livewire\SubjectsComponent;
use App\Livewire\TeachersComponent;
use App\Livewire\TopicsComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/dashboard', AdminDashboardComponent::class)->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/students', StudentsComponent::class)->name('students');
Route::get('/teachers', TeachersComponent::class)->name('teachers');
Route::get('/classes', ClassesComponent::class)->name('classes');
Route::get('/subjects', SubjectsComponent::class)->name('subjects');
Route::get('/settings', SettingsComponent::class)->name('settings');
Route::get('/topics', TopicsComponent::class)->name('topics');
Route::get('/exams', ExamsComponent::class)->name('exams');
Route::get('/marks', MarksComponent::class)->name('marks');
Route::get('/reports', ReportsComponent::class)->name('reports');


require __DIR__ . '/auth.php';








// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
