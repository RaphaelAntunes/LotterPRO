<?php

    use App\Http\Controllers\Admin\Pages\Auth\RegisterController;
    use App\Http\Controllers\Admin\Pages\Dashboards\WalletController;
    use App\Http\Controllers\Admin\Pages\Dashboards\CustomeBalanceController;
    use App\Http\Controllers\Admin\Pages\Dashboards\WinningTicketController;
    use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Pages\Auth\LoginController;
use App\Http\Controllers\Admin\Pages\HomeController;
use App\Http\Controllers\Admin\Pages\Settings\UserController;
use App\Http\Controllers\Admin\Pages\Settings\PermissionController;
use App\Http\Controllers\Admin\Pages\Settings\RoleController;
use App\Http\Controllers\Admin\Pages\Bets\ClientController;
use App\Http\Controllers\Admin\Pages\Bets\CompetitionController;
use App\Http\Controllers\Admin\Pages\Bets\TypeGameController;
use App\Http\Controllers\Admin\Pages\Bets\TypeGameValueController;
use App\Http\Controllers\Admin\Pages\Bets\GameController;
use App\Http\Controllers\Admin\Pages\Bets\ValidateGamesController;
use App\Http\Controllers\Admin\Pages\Bets\DrawController;
use App\Http\Controllers\Admin\Pages\Dashboards\SaleController;
use App\Http\Controllers\Admin\Pages\Dashboards\ReportDayController;
use App\Http\Controllers\Admin\Pages\Dashboards\GainController;
use App\Http\Controllers\Admin\Pages\Dashboards\ExtractController;
use App\Http\Controllers\Admin\Pages\Bets\PaymentController;
use App\Http\Controllers\Admin\Pages\Dashboards\ExtractPointsController;
use App\Http\Controllers\Admin\Pages\Dashboards\RankingController;
use App\Http\Controllers\Admin\Pages\Settings\QualificationController;
use App\Http\Controllers\Admin\Pages\Reports\ReportController;
use App\Http\Controllers\Admin\Pages\Settings\SystemController;
use App\Http\Controllers\Admin\Pages\Settings\LayoutController;
use App\Http\Controllers\Admin\Pages\Settings\LogosController;
use App\Http\Controllers\Admin\Pages\Bets\BichaoController;
use App\Http\Controllers\Admin\Pages\Dashboards\TutoriaisController;
use App\Http\Controllers\Admin\Pages\Dashboards\ResultController;   
use App\Http\Controllers\Admin\Pages\Dashboards\SelectResultController;   

use App\Http\Controllers\CategoriaController;

// recuperar senha controller
use App\Http\Controllers\ForgotPasswordController;


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



Route::get('pedidos', [HomeController::class, 'pedidos']);
Route::get('order', [HomeController::class, 'order']);
Route::get('saquepremiacao', [HomeController::class, 'saquepremiacao']);
Route::get('saquesaldo', [HomeController::class, 'saquesaldo']);
Route::get('atualizarcarteira', [HomeController::class, 'atualizarcarteira']);
Route::get('perfil', [HomeController::class, 'perfil']);
Route::get('bets', [HomeController::class, 'bets']);
Route::get('directs', [HomeController::class, 'directs']);


Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::get('/', [HomeController::class, 'index'])->middleware('guest:admin')->name('homepage');



Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::post('/login', [LoginController::class, 'login'])->name('post.login')->middleware('is.active');;
    });
    Route::middleware(['auth:admin', 'check.openModal'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
     
         
       
       
    });
});

//URL::forceScheme('https');
