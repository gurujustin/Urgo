<?php
require_once 'simple_html_dom.php';

use App\Events\SendNotification;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('pages-login', 'SkoteController@index');
Route::get('pages-login-2', 'SkoteController@index');
Route::get('pages-register', 'SkoteController@index');
Route::get('pages-register-2', 'SkoteController@index');
Route::get('pages-recoverpw', 'SkoteController@index');
Route::get('pages-recoverpw-2', 'SkoteController@index');
Route::get('pages-lock-screen', 'SkoteController@index');
Route::get('pages-lock-screen-2', 'SkoteController@index');
Route::get('pages-404', 'SkoteController@index');
Route::get('pages-500', 'SkoteController@index');
Route::get('pages-maintenance', 'SkoteController@index');
Route::get('pages-comingsoon', 'SkoteController@index');

Route::post('keep-live', 'SkoteController@live');

Route::get('index/{locale}', 'LocaleController@lang');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('/login','Auth\LoginController@show_login_form')->name('login');
Route::post('/login', 'Auth\LoginController@process_login')->name('login');
Route::get('/register', 'Auth\LoginController@show_signup_form')->name('register');
Route::post('/register', 'Auth\LoginController@register')->name('register');

Route::group(['middleware' => ['auth']], function () {
    // Ugro Routes
    Route::get('/ajax-ccountsettingmodal', 'UserController@ajaxAccountSettingModal')->name('user_settingmodal');
    Route::post('/ajax-uploadImg', 'UserController@ajaxUploadImg')->name('upload_img');
    Route::post('/update-account-settings', 'UserController@updateAccountSettings');
    Route::post('/contacts-profile', 'UserController@updateProfile')->name('user_updateprofile');

    Route::get('/lesson-overview-{id}', 'LessonController@overview')->name('lesson_overview');
    Route::get('/lesson-show-{id}', 'LessonController@show')->name('lesson_show');
    Route::get('/lesson/download/{filename?}/{originname?}', 'LessonController@getDownload')->name('lesson_download');

    Route::get('playbook-overview', 'PlaybookController@overview')->name('playbook_overview');
    Route::get('playbook-show-{id}', 'PlaybookController@show')->name('playbook_show');

});

Route::group(['middleware' => ['admin']], function () {
    // Route::get('/send', 'NotificationController@sendNotification');

    Route::get('/lesson-index', 'LessonController@index')->name('lesson_index');
    Route::get('/lesson-create', 'LessonController@create')->name('lesson_create');
    Route::post('/lesson-store', 'LessonController@store')->name('lesson_store');
    Route::get('/lesson-edit-{id}', 'LessonController@edit')->name('lesson_edit');
    Route::post('/lesson-update-{id}', 'LessonController@update')->name('lesson_update');
    Route::get('/lesson-destroy-{id}', 'LessonController@destroy')->name('lesson_destroy');

    Route::get('/lesson-fileupload-{id}',  'LessonController@lessonUpload')->name('lesson_lessonupload');
    Route::post('/lesson-ajax-fileupload', 'LessonController@saveUploadFile')->name('lesson_saveuploadfile');
    Route::get('/lesson-stream-{id}',  'LessonController@videoStream')->name('lesson_video_stream');
    Route::get('/video-downstream-{lessonid}-{downid}',  'LessonController@downfileStream')->name('lesson_down_stream');

    Route::get('/lesson_favorite', 'LessonController@setfavorite');
    Route::get('/lesson_rating', 'LessonController@setrating');

    Route::get('playbook-index', 'PlaybookController@index')->name('playbook_index');
    Route::get('playbook-create', 'PlaybookController@create')->name('playbook_create');
    Route::post('playbook-store', 'PlaybookController@store')->name('playbook_store');
    Route::get('playbook-edit-{id}', 'PlaybookController@edit')->name('playbook_edit');
    Route::post('playbook-update-{id}', 'PlaybookController@update')->name('playbook_update');
    Route::get('/playbook-destroy-{id}', 'PlaybookController@destroy')->name('playbook_destroy');

    Route::get('/notification', 'NotificationController@index')->name('notificaiton');
    Route::post('/notification/send', 'NotificationController@SendNotification')->name('notification-send');

    Route::get('/users', 'UserController@show')->name('user-table');
    Route::post('users/delete/{id}', 'UserController@destroy')->name('user-delete');

    // Facebook Ad library section
    Route::get('fackbook-ad-library', 'FacebookAdLibrary@index')->name('playbook_index');
    Route::post('fbad/store', 'FacebookAdLibrary@store')->name('fbad.store');

    //temp
    Route::get('ad-input', function () {
        return view('ad.input');
    });
    Route::post('ad-content', function (Request $request) {
        $url = $request->adurl;
        $data='';
        // $ch = curl_init();
        // $timeout = 5;
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        // $data = curl_exec($ch);
        // curl_close($ch);
        // $data = file_get_html($url);

        return view('ad.content', ['data' => $data,'url'=>$url]);
    });
});

//Add routes before this line only
Route::get('/{any}', 'HomeController@index');

Route::get('/', 'HomeController@root')->name('home');
