<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/course', [WelcomeController::class, 'course'])->name('course');
Route::get('/event', [WelcomeController::class, 'event'])->name('event');
Route::view('/contact', 'contact')->name('contact');
Route::post('/addcontact', [ContactController::class, 'add'])->name('addcontact');
Route::post('/subscribe', [ContactController::class, 'sub'])->name('subscribe');
Route::get('/trainer', [WelcomeController::class, 'trainer'])->name('trainer');
Route::view('/price', 'price')->name('price');
Route::view('/about', 'about')->name('about');
Route::view('/price', 'price')->name('price');

Route::get('/coursedetail/{id?}', [WelcomeController::class, 'coursedetail'])->name('coursedetail');

Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Route::view('/extra', 'admin.editcourse');
        // course start
        Route::get('/addcourse', function(){
            return view('admin.addcourse');
        })->name('admincourse');

        Route::post('/course', [CourseController::class, 'insert'])->name('addcourse');
        Route::get('/showcourse', [CourseController::class, 'show'])->name('showcourse');
        Route::get('/deletecourse/{id}', [CourseController::class, 'delete'])->name('deletecourse');
        Route::get('/editcourse/{id}', [CourseController::class, 'edit'])->name('editcourse');
        Route::post('/updatecourse', [CourseController::class, 'update'])->name('updatecourse');

        // course end


        //contact start

        Route::get('/showcontact', [ContactController::class, 'show'])->name('showcontact');
        Route::get('/deletecontact/{id}', [ContactController::class, 'delete'])->name('deletecontact');
        Route::get('/showsubscribe', [ContactController::class, 'showsub'])->name('showsubscribe');
        Route::get('/deletesubscribe/{id}', [ContactController::class, 'deletesub'])->name('deletesubscribe');

        //contact end
        //trainer start
        Route::get('/addtrainer', function(){
            return view('admin.addtrainer');
        })->name('admintrainer');

        Route::post('/trainer', [TrainerController::class, 'insert'])->name('addtrainer');
        Route::get('/showtrainer', [TrainerController::class, 'show'])->name('showtrainer');
        Route::get('/deletetrainer/{id}', [TrainerController::class, 'delete'])->name('deletetrainer');
        Route::get('/edittrainer/{id}', [TrainerController::class, 'edit'])->name('edittrainer');
        Route::post('/updatetrainer', [TrainerController::class, 'update'])->name('updatetrainer');




        //trainer end

        //message start


        Route::get('/addmessage', [MessageController::class, 'adminmessage'])->name('adminmessage');
        Route::post('/addadminmessage', [MessageController::class, 'addadminmessage'])->name('addadminmessage');
        Route::get('/message', [MessageController::class, 'showadminmessage'])->name('showadminmessage');



        //message end


});


Route::group(['middleware' => ['auth', 'user']], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/editprofile/{id}', [ProfileController::class, 'edit'])->name('editprofile');
    Route::post('/updateprofile', [ProfileController::class, 'update'])->name('updateprofile');
    Route::get('/changepassword/{id}', function($id){
        return view('student.changepassword');
    })->name('changepass');
    Route::post('/changepassword', [ProfileController::class, 'changepassword'])->name('changepassword');

        //message start


        Route::get('/addusermessage', [MessageController::class, 'usermessage'])->name('usermessage');
        Route::post('/addusermessage', [MessageController::class, 'addusermessage'])->name('addusermessage');
        Route::get('/usermessage', [MessageController::class, 'showusermessage'])->name('showusermessage');
        Route::get('/userallmessage', [MessageController::class, 'showuserallmessage'])->name('showuserallmessage');



        //message end
    
});
