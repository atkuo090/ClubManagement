<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ClubinfoController;
use App\Http\Controllers\ClubofplanController;
use App\Http\Controllers\ClubofclassrecordController;
use App\Http\Controllers\ClubactivityController;
use App\Http\Controllers\FinancialtableController;
use App\Http\Controllers\CluboffeedbackController;
use App\Http\Controllers\ClubactivityapplyController;
use App\Http\Controllers\ClubactivityresultsController;
use App\Http\Controllers\ClubofnewsController;
use App\Http\Controllers\ActivitypicController;
use App\Http\Controllers\ClassrecordpicController;
use App\Http\Controllers\FeedbacktypeController;
use App\Http\Controllers\NewstypeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ClubsemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsattendfileController;
use App\Http\Controllers\MyclubsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BackstageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// 社課紀錄
Route::get('/clubOfclassrecord/{id}/edit',[ClubofclassrecordController::class,'edit']);
Route::get('/clubOfclassrecord',[ClubofclassrecordController::class,'index']);
Route::get('/clubOfclassrecord/create',[ClubofclassrecordController::class,'create']);
Route::get('/clubOfclassrecord/{id}',[ClubofclassrecordController::class,'showALL']);
Route::get('/clubOfclassrecord/{id}/{date}',[ClubofclassrecordController::class,'show']);
Route::post('/clubOfclassrecord',[ClubofclassrecordController::class,'store']);
Route::put('/clubOfclassrecord/{id}',[ClubofclassrecordController::class,'update']);
Route::delete('/clubOfclassrecord/{id}',[ClubofclassrecordController::class,'destroy']);

// 社團活動
Route::get('/Clubactivity/{id}/edit',[ClubactivityController::class,'edit']);
Route::get('/Clubactivity/create',[ClubactivityController::class,'create']);
Route::get('/Clubactivity/{id}',[ClubactivityController::class,'showALL']);
Route::get('/Clubactivity/{id}/{date}',[ClubactivityController::class,'show']);
Route::post('/Clubactivity',[ClubactivityController::class,'store']);
Route::put('/Clubactivity/{id}',[ClubactivityController::class,'update']);
Route::delete('/Clubactivity/{id}',[ClubactivityController::class,'destroy']);

// Laraval 8 更改寫法
Route::get('/',[PagesController::class,'index']);
Route::get('/about',[PagesController::class,'about']);
Route::get('/services',[PagesController::class,'services']);



Route::get('/users/{id}', function ($id) {
    return 'This is user '.$id;
});
Auth::routes();

Route::post('/posts/image_upload',[PostController::class,'upload'])->name('upload');

Route::resource('posts', 'PostController');
Route::get('/posts',[PostController::class,'index']);
// Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts/{id}',[PostController::class,'show']);


// 社團基本資訊
Route::get('/clubs',[ClubinfoController::class,'index']);
Route::get('/clubs/create', [ClubinfoController::class,'create']);
Route::get('/clubs/{id}', [ClubinfoController::class,'show']);
Route::get('/clubs/{id}/edit', [ClubinfoController::class,'edit']);
Route::post('/clubs',[ClubinfoController::class,'store']);
Route::put('/clubs/{id}',[ClubinfoController::class,'update']);
Route::delete('/clubs/{id}',[ClubinfoController::class,'destroy']);

// 社團計畫
// Route::get('/clubOfplan',[ClubofplanController::class,'index']);
Route::get('/clubOfplan/{id}',[ClubofplanController::class,'show']);
Route::post('/clubOfplan',[ClubofplanController::class,'store']);
Route::put('/clubOfplan/{id}',[ClubofplanController::class,'update']);
Route::delete('/clubOfplan/{id}',[ClubofplanController::class,'destroy']);


// 財務表
Route::get('/financialtable/{id}',[FinancialtableController::class,'show']);
Route::post('/financialtable',[FinancialtableController::class,'store']);
Route::put('/financialtable/{id}',[FinancialtableController::class,'update']);
Route::delete('/financialtable/{id}',[FinancialtableController::class,'destroy']);

// 反饋
Route::get('/clubOfFeedback',[CluboffeedbackController::class,'index']);
Route::get('/clubOfFeedback/{id}',[CluboffeedbackController::class,'show']);
Route::post('/clubOfFeedback',[CluboffeedbackController::class,'store']);
Route::put('/clubOfFeedback/{id}',[CluboffeedbackController::class,'update']);
Route::delete('/clubOfFeedback/{id}',[CluboffeedbackController::class,'destroy']);

// 活動申請
Route::get('/activityapply',[ClubactivityapplyController::class,'index']);
Route::get('/activityapply/{id}',[ClubactivityapplyController::class,'show']);
Route::post('/activityapply',[ClubactivityapplyController::class,'store']);
Route::put('/activityapply/{id}',[ClubactivityapplyController::class,'update']);
Route::delete('/activityapply/{id}',[ClubactivityapplyController::class,'destroy']);

// 活動成果(舊,請不要使用)
Route::get('/activityresults',[ClubactivityresultsController::class,'index']);
Route::get('/activityresults/{id}',[ClubactivityresultsController::class,'showALL']);
Route::get('/activityresults/{id}/{date}',[ClubactivityresultsController::class,'show']);
Route::post('/activityresults',[ClubactivityresultsController::class,'store']);
Route::put('/activityresults/{id}',[ClubactivityresultsController::class,'update']);
Route::delete('/activityresults/{id}',[ClubactivityresultsController::class,'destroy']);

// 最新消息
Route::get('/clubOfnews',[ClubofnewsController::class,'index']);
Route::get('/clubOfnews/create',[ClubofnewsController::class,'create']);
Route::get('get-more-users', [ClubofnewsController::class,'getMoreUsers'])->name('users.get-more-users');
Route::get('/clubOfnews/{id}',[ClubofnewsController::class,'showALL']);
Route::get('/clubOfnews/{id}/edit',[ClubofnewsController::class,'edit']);
Route::get('/clubOfnews/{id}/{date}',[ClubofnewsController::class,'show']);
Route::post('/clubOfnews',[ClubofnewsController::class,'store']);
Route::put('/clubOfnews/{id}',[ClubofnewsController::class,'update']);
Route::delete('/clubOfnews/{id}',[ClubofnewsController::class,'destroy']);

// 活動成果照(舊,請不要使用)
Route::get('/activitypic/{id}/{date}',[ActivitypicController::class,'show']);
Route::post('/activitypic',[ActivitypicController::class,'store']);
Route::put('/activitypic/{id}',[ActivitypicController::class,'update']);
Route::delete('/activitypic/{id}',[ActivitypicController::class,'destroy']);

// 社課照片
Route::get('/classrecordpic/{id}/{date}',[ClassrecordpicController::class,'show']);
Route::post('/classrecordpic',[ClassrecordpicController::class,'store']);
Route::put('/classrecordpic/{id}',[ClassrecordpicController::class,'update']);
Route::delete('/classrecordpic/{id}',[ClassrecordpicController::class,'destroy']);

// 反饋類型
Route::get('/feedbacktype',[FeedbacktypeController::class,'index']);
Route::post('/feedbacktype',[FeedbacktypeController::class,'store']);
Route::put('/feedbacktype/{id}',[FeedbacktypeController::class,'update']);
Route::delete('/feedbacktype/{id}',[FeedbacktypeController::class,'destroy']);


// 新聞類型
Route::get('/newstype',[NewstypeController::class,'index']);
Route::post('/newstype',[NewstypeController::class,'store']);
Route::put('/newstype/{id}',[NewstypeController::class,'update']);
Route::delete('/newstype/{id}',[NewstypeController::class,'destroy']);


// 學期類型
Route::get('/semester',[SemesterController::class,'index']);
Route::post('/semester',[SemesterController::class,'store']);
Route::put('/semester/{id}',[SemesterController::class,'update']);
Route::delete('/semester/{id}',[SemesterController::class,'destroy']);


// 社團學期
Route::post('/clubsemester',[ClubsemesterController::class,'store']);
Route::put('/clubsemester/{id}',[ClubsemesterController::class,'update']);
Route::delete('/clubsemester/{id}',[ClubsemesterController::class,'destroy']);


// 消息附加檔案
Route::get('/newattendpic/{id}/{date}',[NewsattendfileController::class,'showpic']);
Route::get('/newattendfile/{id}/{date}',[NewsattendfileController::class,'showfile']);
Route::post('/newattendfile',[NewsattendfileController::class,'store']);
Route::put('/newattendfile/{id}',[NewsattendfileController::class,'update']);
Route::delete('/newattendfile/{id}',[NewsattendfileController::class,'destroy']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// 使用者
Route::get('/user/{id}',[UserController::class,'show']);
Route::post('/user',[UserController::class,'store']);
Route::put('/user/{id}',[UserController::class,'update']);
Route::delete('/user/{id}',[UserController::class,'destroy']);

Route::get('/myclub/{id}',[MyclubsController::class,'show'])->name('a');
Route::get('/home',[IndexController::class,'index']);
// Route::get('/user',[UserController::class,'index']);

Auth::routes();

// 我的社團一覽
Route::get('/join', [DashboardController::class, 'index']);
// 我的後台一覽
Route::get('/backstage', [BackstageController::class, 'index']);
