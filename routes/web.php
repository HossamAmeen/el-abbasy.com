<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Models\Service;
use App\Models\MistakeCategory;
use App\Models\ArticleCategory;
use App\Models\Page;
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
    return redirect('/home');
});

Route::get('/CommingSoon', function () {
    return view('CommingSoon');
});



Route::get('/mistake_article', function () {
    $mistake_categories = MistakeCategory::all();
    $article_categories = ArticleCategory::all();
    $page = Page::where('model_name', 'mistake_article')->get()->first();
    $video ="";
    $explode_video = json_decode($page->video, true);
    if(!empty($explode_video)&& $page->video != null) {
        $video = $explode_video[0]['download_link'];
    }
    $page = $page->load('translations');
    return view('mistake_article', ['mistake_categories' => $mistake_categories , 'article_categories'=>$article_categories , 'page' => $page, 'video'=>$video]);
});
Route::get('/eeta-academy', function () {
    $page = Page::where('model_name', 'Academy')->get()->first();
    $video ="";
    $explode_video = json_decode($page->video, true);
    if(!empty($explode_video)&& $page->video != null) {
        $video = $explode_video[0]['download_link'];
    }
    $page = $page->load('translations');
    return view('EETA_academy',['page' => $page,'video'=>$video]);
});

Route::get('mistake_details/{id}', [\App\Http\Controllers\MistakesController::class, 'show']);
Route::get('article_details/{id}', [\App\Http\Controllers\ArticlesController::class, 'show']);


Route::get('/eeta-check-certificate', [\App\Http\Controllers\EetaController::class,'check_page']);
Route::post('/eeta-check-certificate-graduate', [\App\Http\Controllers\EetaController::class,'check']);

Route::get('/eeta-graduation-page', [\App\Http\Controllers\EetaController::class,'index']);
Route::get('/packages', [\App\Http\Controllers\PackageController::class,'index']);
Route::get('package/packageDetails/{id}', [\App\Http\Controllers\PackageController::class,'detail']);

Route::get('/integration_work_home', [\App\Http\Controllers\IntegrationWorkHomeController::class,'index']);

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('profile/{id}', [\App\Http\Controllers\UserController::class, 'show']);

Route::get('/posts', [\App\Http\Controllers\PostController::class,'index']);
Route::get('/our-works', [\App\Http\Controllers\WorkController::class,'index']);
Route::get('/our-works/{id}', [\App\Http\Controllers\WorkController::class,'show']);
//Route::get('/projects', function () {
//    return view('works');
//});
Route::get('/home', [\App\Http\Controllers\ServiceController::class,'index']);
Route::get('/partners', [\App\Http\Controllers\PartnerController::class,'index']);
Route::get('/AboutUs', [\App\Http\Controllers\AboutUsController::class,'index']);


Route::get('/preview', [\App\Http\Controllers\PreviewController::class,'index']);
Route::post('/preview', [\App\Http\Controllers\PreviewController::class,'submit']);

Route::get('/package_form', [\App\Http\Controllers\PackageFormsController::class,'index']);
Route::get('/callback_package_form', [\App\Http\Controllers\PackageFormsController::class,'index']);
Route::post('/package_form', [\App\Http\Controllers\PackageFormsController::class,'submit']);
Route::get('/UpdatePricePackage/{id}', [\App\Http\Controllers\PackageFormsController::class,'updatepricePackage']);

Route::get('/UpdateCity/{id}', [\App\Http\Controllers\PreviewController::class,'updatecity']);
Route::get('/UpdatePrice/{id}', [\App\Http\Controllers\PreviewController::class,'updateprice']);

Route::get('/CallBack_Preview', [\App\Http\Controllers\PreviewController::class,'callback']);
Route::get('/download_pdf', [\App\Http\Controllers\PreviewController::class,'download_pdf']);

Route::get('/download_pdf/{id}', [\App\Http\Controllers\PreviewController::class,'download_pdf_id']);

Route::get('/contactUs', [\App\Http\Controllers\ContactUsController::class,'index']);
Route::post('/contactUs', [\App\Http\Controllers\ContactUsController::class,'submit']);

Route::get('/jobs', [\App\Http\Controllers\JobsController::class,'index']);


Route::get('/servicesDetails', [\App\Http\Controllers\servicesDetailsController::class,'index']);
Route::post('/order', [\App\Http\Controllers\OrderController::class,'store']);
Route::get('/order', [\App\Http\Controllers\OrderController::class,'index']);
Route::get('/Managers', [\App\Http\Controllers\ManagersController::class,'index']);
Route::get('/teamWork', [\App\Http\Controllers\teamWorkController::class,'index']);

Route::get('servicesDetails/sub_details/{id}', [\App\Http\Controllers\SubDetailController::class,'detail']);

Route::get('/joinUs', [\App\Http\Controllers\CareerFormsController::class,'index']);
Route::post('/joinUs', [\App\Http\Controllers\CareerFormsController::class,'store']);

Route::get('courses/{course_id?}', [\App\Http\Controllers\CourseController::class,'index']);
Route::get('join-course', [\App\Http\Controllers\CourseController::class,'index']);

Route::post('/callback', [\App\Http\Controllers\PayMobController::class,'processedCallback']);
Route::get('/response', [\App\Http\Controllers\PayMobController::class,'processedResponse']);

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('apartments/toggle','\App\Http\Controllers\ApartmentsController@toggle')->name('apartments.toggle');
    Voyager::routes();
});
