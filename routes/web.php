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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::get('/', function () {
            return redirect('website');
        });

        Route::get('google', function () {
            return view('googleAuth');
        });

        Route::get('auth/{provider}', 'Auth\LoginController@redirectToGoogle');
        Route::get('auth/{provider}/callback/', 'Auth\LoginController@handleGoogleCallback');


        Route::namespace('FrontEnd')->prefix('website')->group(function (){

            Route::middleware('auth')->group( function () {
                //update comment
                Route::post('/editComment/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');

                //Store comment
                Route::post('/storeComment/{id}', 'HomeController@commentStore')->name('front.commentStore');
            });

            Route::get('/', 'HomeController@welcome')->name('frontend.welcome');
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/category/{id}', 'HomeController@category')->name('front.category');
            Route::get('/skill/{id}', 'HomeController@skill')->name('front.skill');
            Route::get('/tags/{id}', 'HomeController@tags')->name('front.tag');

            //video details
            Route::get('/video/{id}', 'HomeController@video')->name('front.video');

            Route::get('/fetch_data', 'HomeController@fetch_data');

            //pages
            Route::get('/pages/{id}/{slug?}', 'HomeController@page')->name('front.page');

            //Messages in touch
            Route::post('/contact-us', 'HomeController@messageStore')->name('front.messageStore');

            //user profile
            Route::get('/profile/{id}/{slug?}', 'ProfilesController@profile')->name('front.profile');

            Route::post('/profile/update/{id}/{slug?}', 'ProfilesController@update')->name('profile.update');

            //===== makram =====

            Route::get('/all_project/{id}', 'HomeController@all_project')->name('front.all_project');
            Route::get('/project/{id}', 'HomeController@goToProject')->name('front.goToProject');


            Route::get('/new/{id}', 'HomeController@goToNew')->name('front.goToNew');

            Route::get('/about', 'HomeController@about')->name('front.about');
            Route::get('/contact', 'HomeController@contact')->name('front.contact');
            Route::get('/services', 'HomeController@services')->name('front.services');
            Route::get('/clients', 'HomeController@clients')->name('front.clients');

        });

        Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function (){

            Route::get('/home', 'HomeController@index')->name('home.index');

            //users
            Route::resource('users', 'UsersController')->except('show');

            //categories
            Route::resource('categories', 'CategoriesController')->except('show');

            //skills
            Route::resource('skills', 'SkillsController')->except('show');

            //Tags
            Route::resource('tags', 'TagsController')->except('show');

            //Pages
            Route::resource('pages', 'PagesController')->except('show');

            //videos
            Route::resource('videos', 'VideosController')->except('show');

            //sliders
            Route::resource('sliders', 'SlidersController')->except('show');

            //clients
            Route::resource('clients', 'ClientsController')->except('show');

            //clients
            Route::resource('services', 'ServicesController')->except('show');

            //projects
            Route::resource('projects', 'ProjectsController')->except('show');
            Route::get('/projects/images/{id}', 'ProjectsController@images')->name('projects.images');
            Route::get('/projects/createImages/{id}', 'ProjectsController@createImages')->name('projects.createImages');
            Route::post('/projects/storeImages', 'ProjectsController@storeImages')->name('projects.storeImages');
            Route::get('/projects/editImages/{id}', 'ProjectsController@editImages')->name('projects.editImages');
            Route::put('/projects/updateImages/{id}', 'ProjectsController@updateImages')->name('projects.updateImages');
            Route::delete('/projects/destroyImage/{id}', 'ProjectsController@destroyImage')->name('projects.destroyImage');

            //latest news
            Route::resource('latestnews', 'LatestnewsController')->except('show');

            //messages
            Route::resource('messages', 'MessagesController')->except('show');
            Route::post('messages/replay/{id}', 'MessagesController@replay')->name('replayMessage');

            //comments
            Route::post('comments', 'VideosController@commentStore')->name('comment.store');
            Route::get('comments/{id}', 'VideosController@commentDelete')->name('comment.delete');
            Route::post('comments/{id}', 'VideosController@commentUpdate')->name('comment.update');

            Route::get('form','FormController@create');
            Route::post('form','FormController@store');

        });


        Auth::routes();


    });

Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
