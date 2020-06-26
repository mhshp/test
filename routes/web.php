<?php


/*f
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
//*/
//Route::get('/' , "HomeController@index");
//Route::get('/post' , function() {
//    return "اینجا پست ها نشان داده می شود";
//    });
//Route::get('/search' , function() {
//    return 'اینجا برای جستجو پست هاست';
//    });
//Route::redirect('/post','/search',301);
//Route::resource('/posts','PostsController');
//Route::get('/gohnakhore/{id}','GohnakhoreController@index');
//Route::get('gohnakhoride','GohnakhorideController@show');
//Route::get('showposts','PostsController@show');
//Route::get('saveposts','PostsController@save');
//Route::get('delete','PostsController@delete');
//Route::get('restore','PostsController@restore');

//one to one relationship

//Route::get('user/{id}/post',function($id){
//   $user_post = \App\User::find($id)->post;
//   return $user_post ;
//});

//one to many relationship
//
//Route::get('user/{id}/posts', function($id)
//{
//    $posts = \App\User::find($id)->posts;
//    return $posts ;
//
//});
//
//Route::get('user/{id}/roles', function($id)
//{
//    $roles = \App\User::find($id)->roles;
//    return $roles ;
//
//});
//Route::get('delete',function(){
// $user = \App\User::find(2);
// $user->roles()->detach();
//});
//
//
Auth::routes(['verify' => true]);

Route::get('/home' , 'HomeController@index')->name('home');

//Route::get('/' , function() {
//    $user = \App\User::findOrFail(13);
//    $auth = Auth::login($user);
//dd($auth);


    Route::resource('/posts','PostsController')->middleware(['auth','verified']);


    Route::get('admin' , function() {
        echo 'hello talaie';
})->middleware('isAdmin');

    use Illuminate\Http\Request;

Route::get('session' , function(Request $request) {
    $request->session()->flush();
   return $request->session()->all();
});
Route::get('/',function()
{
    return view('home');
});
