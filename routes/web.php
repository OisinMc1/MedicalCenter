<?php
# @Date:   2019-12-08T03:57:07+00:00
# @Last modified time: 2019-12-08T15:33:27+00:00


//Default Routes

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');

Auth::routes();

//Home Routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');

//Admin:Visits Routes

Route::get('/admin/visits', 'Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create', 'Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits/{id}', 'Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store', 'Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', 'Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}', 'Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}', 'Admin\VisitController@destroy')->name('admin.visits.destroy');

//Admin:Patients Routes

Route::get('/admin/patients', 'Admin\PatientController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientController@destroy')->name('admin.patients.destroy');

//Admin:Doctors Routes

Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

//Doctor:Visits Routes

Route::get('/doctor/visits', 'Doctor\VisitController@index')->name('doctor.visits.index');
Route::get('/doctor/visits/create', 'Doctor\VisitController@create')->name('doctor.visits.create');
Route::get('/doctor/visits/{id}', 'Doctor\VisitController@show')->name('doctor.visits.show');
Route::post('/doctor/visits/store', 'Doctor\VisitController@store')->name('doctor.visits.store');
Route::get('/doctor/visits/{id}/edit', 'Doctor\VisitController@edit')->name('doctor.visits.edit');
Route::put('/doctor/visits/{id}', 'Doctor\VisitController@update')->name('doctor.visits.update');
Route::delete('/doctor/visits/{id}', 'Doctor\VisitController@destroy')->name('doctor.visits.destroy');


//Patients:Visits Routes

Route::get('/patient/visits', 'Patient\VisitController@index')->name('patient.visits.index');
Route::get('/patient/visits/create', 'Patient\VisitController@create')->name('patient.visits.create');
Route::get('/patient/visits/{id}', 'Patient\VisitController@show')->name('patient.visits.show');
Route::post('/patient/visits/store', 'Patient\VisitController@store')->name('patient.visits.store');
Route::get('/patient/visits/{id}/edit', 'Patient\VisitController@edit')->name('patient.visits.edit');
Route::put('/patient/visits/{id}', 'Patient\VisitController@update')->name('patient.visits.update');
Route::delete('/patient/visits/{id}', 'Patient\VisitController@destroy')->name('patient.visits.destroy');
