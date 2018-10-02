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

Route::get('/', 'Auth\LoginController@loginPage');

Auth::routes();

Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback','Auth\RegisterController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user?}', 'User\ProfileController@index')->name('profile');
Route::get('/followers/{user?}', 'User\ProfileController@followerList');
Route::get('/profile-edit', 'User\ProfileController@edit')->name('profile-edit');
Route::post('/profile-edit', 'User\ProfileController@editAction')->name('profile-edit-action');
Route::post('/profile-picture', 'User\ProfileController@profilePicture')->name('profile-picture-update');
Route::get('/food/add', 'Food\FoodController@add')->name('food-add');
Route::post('food/delete-food', 'Food\FoodController@deleteFood');
Route::get('/food/all', 'Food\FoodController@foodList')->name('food-all');
Route::get('/food-home', 'Food\FoodController@foodList');
Route::get('/food/{food}', 'Food\FoodController@index')->name('food');
Route::get('food/add-favourite/{food_id}', 'Food\FoodController@favouriteFood');
Route::get('food/remove-favourite/{food_id}', 'Food\FoodController@unFavouriteFood');
Route::post('/food/add', 'Food\FoodController@addAction');
Route::post('/food/edit/{id}', 'Food\FoodController@editAction');
Route::get('food/delete-portion/{id}', 'Food\PortionController@deletePortion');
Route::get('/food-search', 'Food\FoodController@searchFood')->name('search-food');
Route::post('/portion/add/{foodId}', 'Food\PortionController@add')->name('portion-add');
Route::post('/regionsFilter', 'General\UtilityController@regions');
Route::post('/citiesFilter', 'General\UtilityController@cities');



Route::prefix('order')->group(function () {
    Route::get('basket', 'Order\OrderController@basketPage');
    Route::post('add-order', 'Order\OrderController@addToOrder');
    Route::post('make-order', 'Order\OrderController@makeOrder');
    Route::post('edit-basket', 'Order\OrderController@editUnit');
    Route::get('received', 'Order\OrderController@receivedOrder');
    Route::get('received-history', 'Order\OrderController@receivedOrderHistory');
    Route::get('received-details/{order_id}', 'Order\OrderController@receivedOrderDetails');
    Route::post('dispatched-message', 'Message\MessageController@dispatchMessage');
    Route::post('cancel-message', 'Message\MessageController@cancelOrderMessage');
});

Route::prefix('message')->group(function () {
    Route::get('/', 'Message\MessageController@index');
    Route::get('inbox', 'Message\MessageController@index');
    Route::post('send-message', 'Message\MessageController@saveMessage');
    Route::post('reply-message', 'Message\MessageController@replyMessage');
    Route::post('message-body', 'Message\MessageController@getMessageBody');
    Route::post('message-count', 'Message\MessageController@messageCount');

});

Route::prefix('blog')->group(function () {
    Route::get('/', 'Blog\BlogController@index');
    Route::get('/create', 'Blog\BlogController@addBlog');
    Route::post('/create', 'Blog\BlogController@addAction');
    Route::get('/preview/{blog}', 'Blog\BlogController@preview');
    Route::get('/{blog}', 'Blog\BlogController@blogpage');
    Route::post('publish/{blog}', 'BlogController@publish');
});

//Util
Route::get('/load-currency', 'General\UtilityController@loadCurrency');
Route::get('/test/{food}', 'General\UtilityController@testFood');
//Test POC
Route::get('angular', 'General\AngularController@page');

Route::prefix('user')->group(function () {
    Route::get('points','User\ProfileController@myPoints');
    Route::post('follow/{user_id}', 'User\ProfileController@followUser');
    Route::post('unfollow/{user_id}', 'User\ProfileController@unFollowUser');

});
/*
 * Utilities for public ...
 */
Route::get('contact', function(){
    echo "<h1>Page coming soon</h1>";

});
Route::get('read-more', function(){
    echo "<h1>Page coming soon</h1>";

});

