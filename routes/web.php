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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('welcomepage');



Route::get('/register/confirm/{token}','ConfirmRegisterController@confirm');
// Route::get('/password/reset/','ResetPasswordController@index');
Route::get('/items/search','SearchController@search')->name('search');
Route::post('/contactus','ContactUsController@send')->name('contactus');
Auth::routes();

Route::get('item/news/{id}','NewsController@show')->name('shownews');
Route::get('/news','NewsController@index')->name('news');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'CategoryController@index')->name('showcategory');
Route::get('/category/{id}/filter/{value}', 'FilterController@filter')->name('filteritems');
Route::get('/item/{id}', 'ItemController@index')->name('showitem');


Route::group([
	 'middleware' => ['web', 'auth'],
	
	
], function()
{
	
	Route::post('create/item/{id}/comment','CommentsController@create')->name('createcomment');
	Route::post('create/comment/{id}/{user_id_replay}','CommentReplayController@create')->name('createreplay');
	Route::delete('replay/{id}/delete','CommentReplayController@destroy')->name('destroyreplay');
	Route::delete('comment/{id}/delete','CommentsController@destroy')->name('destroycomment');
	Route::patch('comment/{id}/update','CommentsController@update')->name('updatecomment');
	Route::patch('replay/{id}/update','CommentReplayController@update')->name('updatereplay');

	// messages
	// 
	// 
   	Route::post('/messages/read/{id}', 'ReceivedMessageController@readmsg')->name('readmessage');
	Route::get('/messages', 'MessagesController@index')->name('messages');
	Route::get('messages/show/{id}','ReceivedMessageController@showmsg');

	Route::get('message/receive','ReceivedMessageController@receive')->name('receivemessage');
	Route::get('message/sent','SentMessageController@sent')->name('sentmessage');
	Route::get('create/message','MessagesController@create')->name('createmessage');
	Route::post('message/send','MessagesController@send')->name('sendmessage');
    Route::post('users/name','UsersController@getnames')->name('getnames');
    Route::delete('message/recived/{id}/delete','ReceivedMessageController@destroy')->name('destroyreceivedmessage');
    Route::delete('message/sent/{id}/delete','SentMessageController@destroy')->name('destroysentmessage');

		//chat
    Route::get('/chat','ChatController@index')->name('showchat');
    Route::post('/send','ChatController@send');
  
    Route::post('/getoldmessage',function(){
    	return session()->get('chat');
    	
    });
  
   
 
     Route::post('/savesession','ChatController@savesession');



});






Route::group([
	 'middleware' => ['web', 'auth', 'role:admin'],
	 'prefix'=>'admin',
	 'as'=>'admin.'
], function()
{
	
	Route::resource('category','Admin\CategoryController');
	Route::resource('users','Admin\UserController');
	Route::resource('items','Admin\ItemsController');
	Route::get('images/item/{id}','Admin\ImagesController@index')->name('showimages');
	Route::post('images/item/{id}','Admin\ImagesController@store')->name('storeimages');
	Route::delete('image/item/{id}','Admin\ImagesController@destroy')->name('destroyimage');
	Route::patch('image/item/{id}','Admin\ImagesController@update')->name('updateimage');
	Route::post('item/seach/','Admin\SearchController@search')->name('searchitem');
	Route::get('user/profile/{id}','Admin\ProfileController@index')->name('showprofile');
	Route::patch('user/profile/update/{id}','Admin\ProfileController@update')->name('updateprofile');
	Route::resource('news','Admin\NewsController');
	Route::patch('news/update/description/{id}','Admin\NewsController@updatedescription')->name('updatenewsdescription');
	Route::post('newsimages/upload/{id}','Admin\NewsImagesController@upload')->name('uploadnewsimages');
	Route::post('newsimages/upload/{id}/textarea','Admin\NewsImagesController@uploadtextareaimages')->name('uploadnewsimagestextarea');
	Route::delete('news/image/{id}/delete','Admin\NewsImagesController@deletenewsimage')->name('deletenewsimage');
	 
	
	Route::post('item/thumbnail/{id2}/store','Admin\ItemThumbnailController@store')->name('storethumbnail');
	Route::patch('item/{id}/thumbnail/{id2}/update','Admin\ItemThumbnailController@update')->name('updatethumbnail');
	Route::delete('item/{id}/thumbnail/{id2}/delete','Admin\ItemThumbnailController@destroy')->name('deletethumbnail');

	Route::get('news/step3/{id}','Admin\NewsController@showstep3')->name('createnewsstep3');
	Route::get('news/step2/{id}','Admin\NewsController@showstep2')->name('createnewsstep2');
	//block user
	Route::post('/block/user','Admin\UserController@blockuser');
	Route::post('/change/user/{id}/status','Admin\UserController@changestatus')->name('changestatus');
	// Route::resource('category','CategoryController');
    // Route::get('/', function()
    // {
    //     // Has Auth Filter
    // });

//     Route::get('user/profile', function()
//     {
//         // Has Auth Filter
//     }
// );
});



Route::group([
	 'middleware' => ['web', 'auth', 'role:user'],
	 'prefix'=>'user',
	 'as'=>'user.'
], function()
{
	Route::get('items/create','User\ItemsController@create')->name('useritemcreate');
	Route::get('items/','User\ItemsController@index')->name('useritems');
	Route::post('item/store','User\ItemsController@store')->name('storemyitem');
	Route::delete('items/delete/{id}','User\ItemsController@delete')->name('useritemdelete');
	Route::get('item/edit/{id}','User\ItemsController@edit')->name('useredititem');
	Route::put('item/update/{id}','User\ItemsController@update')->name('userupdateitem');


	Route::post('search/','User\SearchController@search')->name('searchmyitem');
	// images
	Route::get('images/item/{id}/show','User\ImagesController@index')->name('showuserimages');
	Route::post('images/item/{id}/store','User\ImagesController@store')->name('storeuserimages');
	Route::delete('image/item/{id}/destroy','User\ImagesController@destroy')->name('destroyuserimage');
	Route::patch('image/item/{id}/update','User\ImagesController@update')->name('updateuserimage');

	Route::get('profile/','User\ProfileController@index')->name('showuserprofile');
	Route::patch('profile/update','User\ProfileController@update')->name('updateuserprofile');

	Route::post('item/thumbnail/{id2}/store','User\ItemThumbnailController@store')->name('userstorethumbnail');
	Route::patch('item/{id}/thumbnail/{id2}/update','User\ItemThumbnailController@update')->name('userupdatethumbnail');
	Route::delete('item/{id}/thumbnail/{id2}/delete','User\ItemThumbnailController@destroy')->name('userdeletethumbnail');


});