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

use App\Notebook;


Route::get('/', function () {
    return view('welcome');
});
//auth creates register , login , logout and others
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
	Route::get('/add-notebook', 'NotebooksController@ShowAddNotebookForm')->name('notebooks.add');

Route::post('/add', 'NotebooksController@addNotebook')->name('notebooks.save');

Route::get('/notebooks', 'NotebooksController@showNotebooks')->name('notebooks');
/*---naming
Route::get('/t', function(){
	$url = route('notebooks');
	return $url;
}); */

Route::delete('/notebooks/{id}' ,'NotebooksController@destroy')->name('notebooks.delete');

Route::get('/notebooks/edit/{id}', 'NotebooksController@showEditForm')->name('notebooks.edit');

Route::put('/notebooks/update/{id}', 'NotebooksController@update')->name('notebooks.update');
Route::get('/notes/{id}', 'NotesController@showNotes')->name('notes');

Route::get('add-note/{id}', 'NotesController@showAddForm')->name('notes.add');

Route::post('/save-note/{id}', 'NotesController@saveNote')->name('notes.save');

Route::delete('/delete-note/{note_id}/{notebook_id}', 'NotesController@destroy')->name('notes.delete');

Route::get('/notes/edit/{note_id}/{notebook_id}', 'NotesController@showEditForm')->name('notes.edit');

Route::put('/notes/updat/{note_id}/{notebook_id}', 'NotesController@updateNote')->name('notes.update');
Route::get('/notes/details/{id}', 'NotesController@showDetails')->name('notes.details');

Route::get('uploadfile', 'HomeController@uploadfile')->name('imageupload');
Route::post('uploadfile', 'HomeController@uploadFilePost')->name('uploadfile.post');




});

/*
//retrieve note
Route::get('/note/{id}', function($id){
	$notebook = notebook::find($id);
	return $notebook->notes;
});
//create
Route::get('/add-note/{id}', function($id){
	$notebook = Notebook:: find($id);
	$notebook->notes()->create(
		[
		'title'=>'first Note', 
		'body'=>'a very long body'
	    ]
    );
    return 'note added';

});*/

