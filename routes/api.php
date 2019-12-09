<?php

use Illuminate\Http\Request;
use App\generatedImages;
use App\mole;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//PASSPORT ROUTES

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function()
{
   Route::post('details', 'UserController@details');
});


//GENERATED IMAGES ROUTES
 
Route::get('generatedImages', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return generatedImages::all();
});

Route::post('generatedImages', function(Request $request) {
    return generatedImages::create($request->all());
});

Route::put('generatedImages/{id}', function(Request $request, $id) {
    $genIm = generatedImages::findOrFail($id);
    $genIm->update($request->all());

    return $genIm;
});

Route::delete('generatedImages/{id}', function($id) {
    generatedImages::find($id)->delete();

    return 204;
});


//MOLES ROUTES


Route::get('moles', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return mole::all();
});

Route::post('moles', function(Request $request) {
    return mole::create($request->all());
});

Route::put('moles/{id}', function(Request $request, $id) {
    $mole = mole::findOrFail($id);
    $mole->update($request->all());

    return $mole;
});

Route::delete('moles/{id}', function($id) {
    mole::find($id)->delete();

    return 204;
});

Route::get('checksPerMole/{id}',function($id){
    $mole = mole::find($id);
    $checks = generatedImages::where(['id_mole'=>$id])->get();
    //$checks = $mole->checks()->get();
    return $checks;
});