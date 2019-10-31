<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionController');
Route::resource('questions.answers', 'AnswerController')
    ->except(['index', 'show', 'create']);

Route::post('/answers/{answer}/accept', 'AcceptAnswerController@accept')
    ->name('answers.accept');

Route::post('/answers/{answer}/accept', 'AcceptAnswerController@accept')->name('answers.accept');
Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');
Route::post('/questions/{question}/vote','VoteQuestionController@vote')->name('votes.question');
Route::post('/answers/{answer}/vote','VoteAnswerController@vote')->name('votes.answers');


