<?php

use App\Image;

// Route::get('/', function () 
// {
//     $images = Image::all();

//     // foreach ($images as $image => $value) {
        
//     //     echo $value->image_path;
//     //     echo '<br>';
//     //     echo $value->user->name;
      
//     //     echo '<br>';
//     //     foreach ($value->comments as $key) {
//     //         echo $key->content;
      
//     //         echo '<br>';
//     //     }
//     // }
//     // die();
//     return view('welcome');
// });

Auth::routes();// Esta ruta me crea el login y registro
Route::get('/', 'HomeController@index')->name('home');

/*Rutas de Usuario*/
Route::get('/configuracion', 'UserController@config')->name('config');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::post('/updateuser', 'UserController@update')->name('updateuser');
Route::get('/profile/{id}', 'UserController@profile')->name('profile');

Route::get('/gente/{search?}', 'UserController@index')->name('user.index');



/*Rutas de Imagen */
Route::get('/images/create', 'ImageController@create')->name('image.create');
Route::post('/images/save', 'ImageController@saveImg')->name('saveimg');
Route::get('/imagen/userimagen/{filename}', 'ImageController@getImage')->name('image.user');
Route::get('/imagen/{id}', 'ImageController@detail')->name('image.detail');
        /* Editar Post */
        Route::get('/editimage/{id}', 'ImageController@editview')->name('image.edit');   
        Route::post('/editpost/{id}', 'ImageController@editpost')->name('editpost');   
        /* Eliminar Post */
        Route::get('/deletepost/{id}', 'ImageController@deletepost')->name('image.deletepost');

/*Comentario */
Route::post('/images/comment', 'CommentController@crear')->name('comment.img');
Route::get('/images/comment/delete/{id}/{id_img}', 'CommentController@delete')
        ->name('delete.comment');

/*Likes */
Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');

