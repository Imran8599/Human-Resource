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
Route::group(['middleware' => ['EmployeeMiddleware']],function(){
    Route::get('employee-login','EmployeeAuthController@employeeLogin');
    Route::post('employee-login','EmployeeAuthController@employeeLoginAuth');
});

Route::group(['middleware' => ['ProfileMiddleware']],function(){
    Route::post('employee-chat','ChatController@send');
    Route::get('profile','ProfileController@index');
    Route::get('employee-logout','EmployeeAuthController@employeeLogout');
    Route::get('apply-leave','ApplyLeaveController@index');
    Route::post('apply-leave','ApplyLeaveController@store');
    Route::post('change-password','ApplyLeaveController@changePassword');
});





Route::group(['middleware' => ['AdminMiddleware']],function(){
    Route::get('admin-login','AdminAuthController@adminLogin');
    Route::post('admin-login','AdminAuthController@adminLoginAuth');
});

Route::group(['middleware' => ['DashboardMiddleware']],function(){
    Route::get('admin-logout','AdminAuthController@adminLogout');

    Route::get('/','DashboardController@index');
    
    Route::post('admin-chat','ChatController@send');

    Route::get('all-events','DashboardController@allEvents');
    
    Route::get('employee','EmployeeController@index');
    Route::post('employee','EmployeeController@store');
    Route::get('addemployee','EmployeeController@addEmployee');
    Route::get('employee-edit/{id}','EmployeeController@employeeEdit');
    Route::post('update','EmployeeController@employeeUpdate');
    Route::get('employee-delete/{id}','EmployeeController@employeeDelete');
    
    Route::get('department','DepartmentController@index');
    Route::post('department','DepartmentController@storeDepartment');
    Route::get('department-edit/{id}','DepartmentController@departmentEdit');
    Route::post('department-update','DepartmentController@departmentUpdate');
    Route::get('department-delete/{id}','DepartmentController@departmentDelete');

    Route::post('designation','DepartmentController@storeDesignation');
    Route::get('designation-edit/{id}','DepartmentController@designationEdit');
    Route::post('designation-update','DepartmentController@designationUpdate');
    Route::get('designation-delete/{id}','DepartmentController@designationDelete');
    //Ajax route
    Route::get('select-department','DepartmentController@selectDepartment');
    
    Route::get('events','EventsController@index');
    Route::get('all-events','EventsController@allEvents');
    Route::post('events','EventsController@store');
    Route::get('events-edit/{id}','EventsController@edit');
    Route::get('events-delete/{id}','EventsController@delete');
    Route::post('events-update','EventsController@update');

    Route::get('award','AwardController@index');
    Route::post('award','AwardController@store');
    Route::post('award-update','AwardController@update');
    Route::get('award-edit/{id}','AwardController@edit');
    Route::get('award-delete/{id}','AwardController@delete');
    
    Route::get('expense','ExpenseController@index');
    Route::post('expense','ExpenseController@store');
    Route::get('expense-edit/{id}','ExpenseController@edit');
    Route::get('expense-delete/{id}','ExpenseController@delete');
    Route::post('expense-update','ExpenseController@update');
    
    Route::get('holiday','HolidayController@index');
    Route::post('holiday','HolidayController@store');
    Route::get('holiday-edit/{id}','HolidayController@edit');
    Route::get('holiday-delete/{id}','HolidayController@delete');
    Route::post('holiday-update','HolidayController@update');
    
    Route::get('leave','LeaveController@index');
    Route::get('leave-approve/{id}','LeaveController@approve');
    Route::get('leave-delete/{id}','LeaveController@delete');
    
    Route::get('notice','NoticeController@index');
    Route::post('notice','NoticeController@store');
    Route::get('notice-edit/{id}','NoticeController@edit');
    Route::get('notice-delete/{id}','NoticeController@delete');
    Route::post('notice-update','NoticeController@update');

    Route::get('payroll','PayrollController@index');
    Route::post('payroll-search','PayrollController@search');
    Route::get('payroll-generate/{id}','PayrollController@payrollGenerate');
    Route::post('payroll-generate','PayrollController@payrollGenerator');
    Route::get('payroll-pay-view/{id}','PayrollController@payrollPayView');
    Route::post('payroll-pay','PayrollController@payrollPay');
    Route::get('payroll-view/{id}','PayrollController@payrollView');
    Route::get('payroll-report','PayrollController@payrollReport');
    
    Route::get('leavetype','LeaveTypeController@index');
    Route::post('leavetype','LeaveTypeController@store');
    Route::get('leavetype-edit/{id}','LeaveTypeController@edit');
    Route::get('leavetype-delete/{id}','LeaveTypeController@delete');
    Route::post('leavetype-update','LeaveTypeController@update');

    Route::get('markattendance','MarkAttendanceController@index');
    Route::post('mark-attendance','MarkAttendanceController@store');
    Route::get('viewattendance','ViewAttendanceController@index');
    
    Route::get('general-setting','SettingController@generalSetting');
    Route::post('general-setting','SettingController@generalSettingStore');
    Route::get('general-setting-edit/{id}','SettingController@generalSettingEdit');
    Route::post('general-setting-update','SettingController@generalSettingUpdate');
    Route::get('email-setting','SettingController@emailSetting');
});