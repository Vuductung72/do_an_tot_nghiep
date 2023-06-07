<?php

use App\Http\Controllers\admin\AchievementsController;
use App\Http\Controllers\admin\AchievementsTypeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AllowanceController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DisciplinesController;
use App\Http\Controllers\admin\DisciplinesTypeController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PositionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\staff\AccountController;
use App\Http\Controllers\staff\AchievementsController as StaffAchievementsController;
use App\Http\Controllers\staff\AllowancesController;
use App\Http\Controllers\staff\AttendanceController;
use App\Http\Controllers\staff\DisciplinesController as StaffDisciplinesController;
use App\Http\Controllers\staff\LoginController as StaffLoginController;
use App\Http\Controllers\web\LoginController as WebLoginController;
use App\Http\Controllers\web\RecruitmentController as WebRecruitmentController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/login', [LoginController::class, 'index'])->name('ad.login.index');
Route::post('/login', [LoginController::class, 'login'])->name('ad.login');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('ad.logout');

Route::group(['prefix' => '/admin', 'as' => 'ad.', 'namespace' => 'Admin', 'middleware' => 'checkrole'], function () {

    // Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::prefix('tai-khoan-quan-tri')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins_index');
        Route::get('/them', [AdminController::class, 'create'])->name('admins_create');
        Route::post('/store', [AdminController::class, 'store'])->name('admins_store');
        Route::get('/chi-tiet/{id}', [AdminController::class, 'show'])->name('admins_show');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admins_update');
        Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('admins_destroy');
    });

    Route::prefix('phong-ban')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments_index');
        Route::get('/them', [DepartmentController::class, 'create'])->name('departments_create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments_store');
        Route::get('/chi-tiet/{id}', [DepartmentController::class, 'edit'])->name('departments_edit');
        Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('departments_update');
        Route::get('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments_destroy');
    });

    Route::prefix('chuc-vu')->group(function () {
        Route::get('/', [PositionController::class, 'index'])->name('positions_index');
        Route::get('/them', [PositionController::class, 'create'])->name('positions_create');
        Route::post('/store', [PositionController::class, 'store'])->name('positions_store');
        Route::get('/chi-tiet/{id}', [PositionController::class, 'edit'])->name('positions_edit');
        Route::post('/update/{id}', [PositionController::class, 'update'])->name('positions_update');
        Route::get('/destroy/{id}', [PositionController::class, 'destroy'])->name('positions_destroy');
    });

    Route::prefix('nhan-vien')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('staffs_index');
        Route::get('/them', [StaffController::class, 'create'])->name('staffs_create');
        Route::post('/store', [StaffController::class, 'store'])->name('staffs_store');
        Route::get('/chi-tiet/{id}', [StaffController::class, 'edit'])->name('staffs_edit');
        Route::post('/update/{id}', [StaffController::class, 'update'])->name('staffs_update');
        Route::get('/destroy/{id}', [StaffController::class, 'destroy'])->name('staffs_destroy');
        Route::get('/bang-cong/{id}', [StaffController::class, 'attendance'])->name('staffs_attendance');
        Route::get('/bang-luong/{id}' , 'StaffController@listpaychecks')->name('staffs_litspaycheck');
        Route::post('/tinh-bang-luong/{id}' , 'StaffController@calculatorSalary')->name('staffs_calculatorSalary');
        Route::get('/tim-kiem', 'StaffController@search')->name('staffs_search');
        Route::get('/thay-doi-luong/{id}', 'StaffController@salaryChange')->name('staffs_change');
        Route::post('/thay-doi-luong/{id}' , 'StaffController@calculatorSalaryChange')->name('staffs_calculatorSalaryChange');
        Route::get('/{id}/phu-cap', 'StaffController@allowance')->name('staffs_allowance');
        Route::post('/{id}/phu-cap', 'StaffController@postAllowance')->name('post.staffs_allowance');
        Route::get('{id}/ngay-nghi', 'StaffController@day_off')->name('staffs_day_off');
        Route::get('{id}/phat', 'PunishController@create')->name('punish_create');
        Route::post('{id}/phat', 'PunishController@store')->name('punish_store');
        Route::get('{id}/sua/{id_punish}', 'PunishController@edit')->name('punish_edit');
        Route::post('{id}/sua/{id_punish}', 'PunishController@update')->name('punish_update');
        Route::get('xoa-phat/{id}', 'PunishController@destroy')->name('punish_destroy');

    });

    Route::prefix('danh-sach-bang-luong')->group(function () {
        Route::get('/', 'PaycheckController@index')->name('paychecks_index');
        Route::get('/chi-tiet/{id}', 'PaycheckController@show')->name('paychecks_show');
        Route::get('/tim-kiem', 'PaycheckController@search')->name('paychecks_search');
    });

    Route::prefix('danh-sach-tang-luong')->group(function () {
        Route::get('/', 'SalaryChangeController@index')->name('salary_change_index');
        Route::get('/chi-tiet/{id}', 'SalaryChangeController@show')->name('salary_change_show');
        Route::get('/tim-kiem', 'SalaryChangeController@search')->name('salary_change_search');

    });

    Route::prefix('ngay-nghi')->group(function () {
        Route::get('/', 'LeaveController@index')->name('leave_index');
        Route::get('/tim-kiem', 'LeaveController@search')->name('leave_search');
        Route::post('/status/{id}', 'LeaveController@status')->name('leave_status');

    });

    Route::prefix('khen-thuong')->group(function () {
        Route::get('/', [AchievementsController::class, 'index'])->name('achievements_index');
        Route::get('/them', [AchievementsController::class, 'create'])->name('achievements_create');
        Route::post('/store', [AchievementsController::class, 'store'])->name('achievements_store');
        Route::get('/chi-tiet/{id}', [AchievementsController::class, 'edit'])->name('achievements_edit');
        Route::post('/update/{id}', [AchievementsController::class, 'update'])->name('achievements_update');
        Route::get('/destroy/{id}', [AchievementsController::class, 'destroy'])->name('achievements_destroy');
        Route::get('/tim-kiem', 'AchievementsController@search')->name('achievements_search');
    });

    Route::prefix('loai-khen-thuong')->group(function () {
        Route::get('/', [AchievementsTypeController::class, 'index'])->name('achievementTypes_index');
        Route::get('/them', [AchievementsTypeController::class, 'create'])->name('achievementTypes_create');
        Route::post('/store', [AchievementsTypeController::class, 'store'])->name('achievementTypes_store');
        Route::get('/chi-tiet/{id}', [AchievementsTypeController::class, 'edit'])->name('achievementTypes_edit');
        Route::post('/update/{id}', [AchievementsTypeController::class, 'update'])->name('achievementTypes_update');
        Route::get('/destroy/{id}', [AchievementsTypeController::class, 'destroy'])->name('achievementTypes_destroy');
    });

    Route::prefix('ki-luat')->group(function () {
        Route::get('/', [DisciplinesController::class, 'index'])->name('disciplines_index');
        Route::get('/them', [DisciplinesController::class, 'create'])->name('disciplines_create');
        Route::post('/store', [DisciplinesController::class, 'store'])->name('disciplines_store');
        Route::get('/chi-tiet/{id}', [DisciplinesController::class, 'edit'])->name('disciplines_edit');
        Route::post('/update/{id}', [DisciplinesController::class, 'update'])->name('disciplines_update');
        Route::get('/destroy/{id}', [DisciplinesController::class, 'destroy'])->name('disciplines_destroy');
        Route::get('/tim-kiem', 'DisciplinesController@search')->name('disciplines_search');
    });

    Route::prefix('loai-ki-luat')->group(function () {
        Route::get('/', [DisciplinesTypeController::class, 'index'])->name('disciplinesTypes_index');
        Route::get('/them', [DisciplinesTypeController::class, 'create'])->name('disciplinesTypes_create');
        Route::post('/store', [DisciplinesTypeController::class, 'store'])->name('disciplinesTypes_store');
        Route::get('/chi-tiet/{id}', [DisciplinesTypeController::class, 'edit'])->name('disciplinesTypes_edit');
        Route::post('/update/{id}', [DisciplinesTypeController::class, 'update'])->name('disciplinesTypes_update');
        Route::get('/destroy/{id}', [DisciplinesTypeController::class, 'destroy'])->name('disciplinesTypes_destroy');
    });

    Route::prefix('phu-cap')->group(function () {
        Route::get('/', [AllowanceController::class, 'index'])->name('allowances_index');
        Route::get('/chi-tiet/{id}', [AllowanceController::class, 'edit'])->name('allowances_edit');
        Route::post('/update/{id}', [AllowanceController::class, 'update'])->name('allowances_update');
        Route::get('/destroy/{id}', [AllowanceController::class, 'destroy'])->name('allowances_destroy');
        Route::get('/tim-kiem', 'AllowanceController@search')->name('allowances_search');
    });

    Route::prefix('vai-tro')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles_index');
        Route::get('/them', [RoleController::class, 'create'])->name('roles_create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles_store');
        Route::get('/chi-tiet/{id}', [RoleController::class, 'edit'])->name('roles_edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles_update');
        Route::get('/destroy/{id}', [RoleController::class, 'destroy'])->name('roles_destroy');
    });

    Route::prefix('hanh-dong')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permissions_index');
        Route::get('/them', [PermissionController::class, 'create'])->name('permissions_create');
        Route::post('/store', [PermissionController::class, 'store'])->name('permissions_store');
        Route::get('/chi-tiet/{id}', [PermissionController::class, 'edit'])->name('permissions_edit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permissions_update');
        Route::get('/destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions_destroy');
    });

    Route::prefix('tin-tuyen-dung')->group(function () {
        Route::get('/', 'RecruitmentController@index')->name('recruitments_index');
        Route::get('/them', 'RecruitmentController@create')->name('recruitments_create');
        Route::post('/store', 'RecruitmentController@store')->name('recruitments_store');
        Route::get('/chi-tiet/{id}', 'RecruitmentController@edit')->name('recruitments_edit');
        Route::post('/update/{id}', 'RecruitmentController@update')->name('recruitments_update');
        Route::post('/status/{id}', 'RecruitmentController@status')->name('recruitments_status');
        Route::post('/status-apply/{id}', 'RecruitmentController@statusApplyRecruitment')->name('recruitments_status_apply');
        Route::get('/thong-tin-nguoi-tuyen-dung/{id}', 'ApplyRecruitmentController@show')->name('apply_recruitments_show');
        Route::get('/tim-kiem', 'RecruitmentController@search')->name('recruitments_search');
        Route::get('/download/{id}', 'ApplyRecruitmentController@download')->name('download_cv');
    });

});

Route::get('/staff', [StaffLoginController::class, 'index'])->name('staff.login.index');
Route::post('/staff', [StaffLoginController::class, 'login'])->name('staff.login');
Route::get('/staff/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');

Route::group(['prefix' => '/staff', 'as' => 'staff.', 'namespace' => 'Staff', 'middleware' => 'checkstafflogin'], function () {

    Route::prefix('nhan-vien')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('accounts_index');
        Route::post('/update/{staff}',[AccountController::class, 'update'])->name('accounts.update');
    });

    Route::prefix('diem-danh')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('attendance_index');
        Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('attendance_checkIn');
        Route::post('/check-out', 'AttendanceController@checkOut')->name('attendance_checkOut');
    });

    Route::prefix('khen-thuong')->group(function () {
        Route::get('/', [StaffAchievementsController::class, 'index'])->name('achievement_index');
    });

    Route::prefix('ki-luat')->group(function () {
        Route::get('/', [StaffDisciplinesController::class, 'index'])->name('disciplines_index');
    });

    Route::prefix('phu-cap')->group(function () {
        Route::get('/', [AllowancesController::class, 'index'])->name('allowances_index');
    });

    Route::get('/phat', 'PunishController@index')->name('punish_index');


    Route::prefix('bang-luong')->group(function () {
        Route::get('/', 'PaycheckController@index')->name('paycheck_index');
    });

    Route::prefix('thay-doi-luong')->group(function () {
        Route::get('/', 'SalaryChangeController@index')->name('salary_index');
    });

    Route::prefix('xin-nghi')->group(function () {
        Route::get('/', 'LeaveController@index')->name('leave_index');
        Route::post('/post', 'LeaveController@leave')->name('leave_post');
        Route::get('/delete/{id}', 'LeaveController@delete')->name('leave_destroy');

    });

});

Route::get('/dang-nhap',[WebLoginController::class, 'getLogin'] )->name('w.login');
Route::post('/dang-nhap',[WebLoginController::class, 'login'] )->name('w.login.login');
Route::get('/dang-ky',[WebLoginController::class, 'getRegister'] )->name('w.register');
Route::post('/dang-ky',[WebLoginController::class, 'register'] )->name('w.register.store');

Route::group(['as' => 'w.', 'namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/tuyen-dung', [WebRecruitmentController::class, 'index'])->name('recruitment');
    Route::get('/tin-tuyen-dung/{slug}', [WebRecruitmentController::class, 'show'])->name('recruitment.show');
    Route::post('/ung-tuyen/{id}', [WebRecruitmentController::class, 'recruitment'])->name('recruitment.recruitment');
    Route::get('/thong-tin-tai-khoan', 'AccountController@index')->name('account.index');
    Route::post('/thong-tin-tai-khoan/update/{user}', 'AccountController@update')->name('account.update');
    Route::get('/danh-sach-ung-tuyen', 'AccountController@listRecruitment')->name('account.list.recruitment');
    Route::get('/logout', [WebLoginController::class, 'logout'])->name('logout');
});

