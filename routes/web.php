<?php
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Auth::routes();

Route::middleware([
    'auth'
])->group(function () {

    Route::get('/', function () {
        return view('ajax');
    });

    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');

    })->name('dashboard.index')->middleware('ajax');


    

    
    Route::get('/reports/downloadfile/{id}', 'reportsController@downloadFile')->name('reports.downloadFile');
    
    Route::get('/reports/graphImg/{id}', 'reportsController@graphImage')->name('reports.graphImage');
    Route::get('/reports/imageResource/{id}', 'reportsController@resourceImage')->name('reports.resourceImage');
    
    
    Route::get('/reports/emailDownload/{id}', 'reportsController@downloadEmailPDF')->name('reports.downloadEmailPDF');
    Route::get('/reports/download/{id}', 'reportsController@downloadEmailPDF')->name('reports.downloadPDFID');
    
    // Report Generation
    Route::get('/reports/generate/{id}', 'reportsController@showReport')->name('reports.generate'); 
     
    Route::middleware([
        'ajax'
    ])->group(function () {

        

        
        
        // Report Views
        Route::get('/reports/completed', 'reportsController@index')->name('reports.index');
        Route::get('/reports/expired', 'reportsController@reportExpired')->name('reports.expired');
        Route::post('/reports/email','reportsController@scheduleEmailDelivery')->name('reports.requestEmail');
        Route::post('/reports/download', 'reportsController@downloadPDF')->name('reports.downloadPDF');
        
        // Testing Portal
        Route::get('/test_portal', 'testPortalController@index')->name('test_portal.index');
        Route::get('/resume', 'testPortalController@resume')->name('test_portal.resume');
        Route::post('/test_portal/start', 'testPortalController@start')->name('test_portal.start');
        

        // Horses
        Route::get('/horses', 'horseController@index')->name('horses');
        Route::post('/horses/create', 'horseController@create')->name('horses.create');
        Route::post('/horses/delete', 'horseController@delete')->name('horses.delete');
        Route::post('/horses/edit', 'horseController@edit')->name('horses.edit');


        // Riders
        Route::get('/riders', 'ridersController@index')->name('riders.index');
        Route::post('/riders/create', 'ridersController@create')->name('riders.create');
        Route::post('/riders/delete', 'ridersController@delete')->name('riders.delete');
        Route::post('/riders/edit', 'ridersController@edit')->name('riders.edit');

        // Account
        Route::get('/account', 'profileController@index')->name('account.index');
        Route::post('/account/resetPassword', 'profileController@resetPassword')->name('account.resetPassword');
//      Route::post('/account/delete', 'profileController@delete')->name('riders.delete');
        Route::post('/account/edit', 'profileController@edit')->name('account.edit');
        Route::post('/account/claim', 'profileController@claimCode')->name('account.claim');
        
        // Assessment
        Route::get('/assessment', 'assessmentController@index')->name('assessment');
        Route::get('/assessment/{rid}', 'assessmentController@index')->name('assessment');
        Route::post('/assessment/save', 'assessmentController@saveProgress')->name('assessment.saveProgress');
        
        // Potato
        Route::get('/potato', 'adminController@rottonPotato')->name('admin.potato');
        Route::post('/potato/addTests', 'adminController@addTests')->name('admin.potato.addTests');
        Route::post('/potato/schedulePromos', 'adminController@schedulePromos')->name('admin.potato.schedulePromos');
        Route::post('/potato/generateBatch', 'adminController@generateBatch')->name('admin.potato.generateBatch');
        Route::post('/potato/tinker', 'adminController@tinkerTest')->name('admin.potato.tinker');
    });
});