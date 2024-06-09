<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', [UserController::class, 'viewIndex'])->name('index');
Route::get('/listings', [UserController::class, 'viewListings'])->name('listings');
Route::get('/{property}/property', [PropertyController::class, 'viewProperty'])->name('property');
Route::post('/listings/filtered', [UserController::class, 'viewFilteredListings'])->name('listingsFiltered');
Route::post('/listings/search', [UserController::class, 'searchProperty'])->name('listingsSearch');
Route::post('/listings/searchs', [UserController::class, 'customSearch'])->name('customSearch');
Route::get('/aboutUS', [UserController::class, 'viewAboutUs'])->name('aboutUs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/property/add', [PropertyController::class, 'create'])->name('admin.admin_dashboard_components.properties.add_properties');
    Route::post('/admin/property', [PropertyController::class, 'store'])->name('admin.admin_dashboard_components.properties.store_properties');
    Route::get('/admin/property/view', [PropertyController::class, 'index'])->name('admin.admin_dashboard_components.properties.view_properties');
    Route::get('/admin/property/edit/{property}', [PropertyController::class, 'edit'])->name('admin.admin_dashboard_components.properties.edit_properties');
    Route::put('/admin/property/{property}', [PropertyController::class, 'update'])->name('admin.admin_dashboard_components.properties.update_properties');
    Route::delete('/admin/property/{property}', [PropertyController::class, 'destroy'])->name('admin.admin_dashboard_components.properties.destroy_properties');
    Route::get('/admin/agents/view', [UserController::class, 'getAgents'])->name('admin.admin_dashboard_components.agents.view_agents');
    Route::get('/admin/users/view', [UserController::class, 'getUsers'])->name('admin.admin_dashboard_components.users.view_users');
    Route::get('/admin/profile', [UserController::class, 'editProfile'])->name('admin.admin_dashboard_components.profile');
    Route::put('/admin/profile/update', [UserController::class, 'updateProfile'])->name('admin.admin_dashboard_components.update');
    Route::get('/admin/testimonials', [AdminController::class, 'viewTestimonials'])->name('admin.testimonials');
    Route::put('/admin/testimonials/set', [AdminController::class, 'setTestimonial'])->name('admin.testimonialSet');
    Route::delete('/users/{user}', [UserController::class, 'deleteUser'])->name('users.delete');


    
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/property/add', [AgentController::class, 'create'])->name('agent.add_properties');
    Route::post('/agent/property', [AgentController::class, 'store'])->name('agent.store_properties');
    Route::get('/agent/property/view', [AgentController::class, 'index'])->name('agent.view_properties');
    Route::get('/agent/property/edit/{property}', [AgentController::class, 'edit'])->name('agent.edit_properties');
    Route::put('/agent/property/{property}', [AgentController::class, 'update'])->name('agent.update_properties');
    Route::delete('/agent/property/{property}', [AgentController::class, 'destroy'])->name('agent.destroy_properties');
    Route::get('/agent/profile', [AgentController::class, 'editProfile'])->name('agent.profile');
    Route::put('/agent/profile/update', [AgentController::class, 'updateProfile'])->name('agent.update');
    Route::get('/agent/contact', [AgentController::class, 'viewContact'])->name('agent.contact');
    Route::get('/agent/contact/reply/{contact}', [AgentController::class, 'replyContact'])->name('agent.reply');
    Route::post('/agent/contact/reply/email', [ContactController::class, 'sendMail'])->name('agent.reply_store');

});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logouts');

