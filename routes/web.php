<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

// Teacher Route Start
Route::get('teachers',[
	'uses' => 'TeacherController@index',
	'as' => 'teachers'
]);

Route::get('teacher/create',[
	'uses' => 'TeacherController@create',
	'as' => 'teacher.create'
]);

Route::post('teacher/store',[
	'uses' => 'TeacherController@store',
	'as' => 'teacher.store'
]);

Route::get('teacher/edit/{id}',[
	'uses' => 'TeacherController@edit',
	'as' => 'teacher.edit'
]);


Route::post('teacher/update/{id}',[
	'uses' => 'TeacherController@update',
	'as' => 'teacher.update'
]);

Route::get('teacher/delete/{id}',[
	'uses' => 'TeacherController@destroy',
	'as' => 'teacher.delete'
]);


// Student Route Start 
Route::get('students',[
	'uses' => 'StudentController@index',
	'as' => 'students'
]);

Route::get('student/create',[
	'uses' => 'StudentController@create',
	'as' => 'student.create'
]);

Route::post('student/store',[
	'uses' => 'StudentController@store',
	'as' => 'student.store'
]);

Route::get('student/edit/{id}',[
	'uses' => 'StudentController@edit',
	'as' => 'student.edit'
]);


Route::post('student/update/{id}',[
	'uses' => 'StudentController@update',
	'as' => 'student.update'
]);

Route::get('student/delete/{id}',[
	'uses' => 'StudentController@destroy',
	'as' => 'student.delete'
]);

// Search Student

Route::get('student/find',[
	'uses' => 'StudentController@find',
	'as' => 'search'
]);

Route::post('student/search/',[
	'uses' => 'StudentController@search',
	'as' => 'student.search'
]);