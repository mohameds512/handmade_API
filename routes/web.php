<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('dd',function(){
    return 'dddddddddddd';
});

// Route::get('/reg/{token}', [\App\Http\Controllers\Auth\RegisterController::class , 'reg'])->name('reg');
// // ->middleware('hasInvitation')

// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => true, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
// ]);
// Route::get('/register',function (){
//     return abort('404');
// })->name('register');

// Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class , 'register']);


// Route::post('/reg', [\App\Http\Controllers\Auth\RegisterController::class , 'register'])->name('reg-create');


// // {token} is a required parameter that will be exposed to us in the controller method
// //Route::get('/passwordd', [\App\Http\Controllers\Auth\RegisterController::class , 'passwordd'])->name('passwordd');


// Route::group(['middleware'=>['auth','active']],function (){

//     Route::get('invite',[\App\Http\Controllers\Hr\UsersController::class , 'invite'])->name('invite');
//     Route::post('invite', [\App\Http\Controllers\Hr\UsersController::class , 'process'])->name('process');
//     Route::get('invitations',[\App\Http\Controllers\Hr\UsersController::class , 'invitations'])->name('invitations');

//     Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
//     Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
//     Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'profileEdit'])->name('profile.edit');
//     Route::put('/profile', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('profile.update');


//     Route::get('/notifications', [\App\Http\Controllers\HomeController::class,'notifications'])->name('notifications');

//     Route::group(['prefix'=>'hr', 'as' => 'hr.',],function (){
//         Route::get('roles/permissions',[\App\Http\Controllers\Hr\RolesController::class,'permissions'])->name('roles.permissions');
//         Route::post('roles/permissions',[\App\Http\Controllers\Hr\RolesController::class,'permissionsCreate']);
//         Route::delete('permission/delete/{id}',[\App\Http\Controllers\Hr\RolesController::class,'permissionsDelete'])->name('permission.delete');


//         Route::resource('users',\App\Http\Controllers\Hr\UsersController::class);
//         Route::resource('roles',\App\Http\Controllers\Hr\RolesController::class);
//         Route::resource('employees',\App\Http\Controllers\Hr\EmployeesController::class);
//     });




//     Route::group(['prefix'=>'crm', 'as' => 'crm.',],function (){
//         Route::resource('clients',\App\Http\Controllers\Crm\ClientsController::class);
//         Route::resource('companies',\App\Http\Controllers\Crm\CompaniesController::class);
//         Route::resource('actions',\App\Http\Controllers\Crm\ActionsController::class);
//     });



//     Route::group(['prefix'=>'purchases', 'as' => 'purchases.',],function (){
//         Route::resource('bills',\App\Http\Controllers\Purchases\BillsController::class);
//         Route::resource('payments',\App\Http\Controllers\Purchases\PaymentController::class);
//         Route::resource('vendors',\App\Http\Controllers\Purchases\VendorController::class);
//     });

//     Route::group(['prefix'=>'inventory', 'as' => 'inventory.',],function (){
//         Route::get('/',[\App\Http\Controllers\Inventory\InventoryController::class,'index'])->name('index');
//         Route::get('/pending',[\App\Http\Controllers\Inventory\InventoryController::class,'pending'])->name('pending');
//         Route::post('/add',[\App\Http\Controllers\Inventory\InventoryController::class,'add'])->name('add');

//         Route::get('/products',[\App\Http\Controllers\Inventory\InventoryController::class,'products'])->name('products');
//         Route::get('/products/pending',[\App\Http\Controllers\Inventory\InventoryController::class,'productsPending'])->name('products.pending');
//         Route::post('/products/add',[\App\Http\Controllers\Inventory\InventoryController::class,'addProducts'])->name('products.add');



//         Route::get('/{id}',[\App\Http\Controllers\Inventory\InventoryController::class,'show'])->name('show');
//         Route::get('/{id}/insert',[\App\Http\Controllers\Inventory\InventoryController::class,'insert'])->name('insert');
//     });


//     Route::group(['prefix'=>'sales', 'as' => 'sales.',],function (){
//         Route::get('/{id}/print',[\App\Http\Controllers\Sales\PriceOfferController::class,'print'])->name('price-offers.print');
//         Route::resource('/price-offers',\App\Http\Controllers\Sales\PriceOfferController::class);

//         Route::resource('invoices',\App\Http\Controllers\Sales\InvoicesController::class);
//         Route::resource('revenues',\App\Http\Controllers\Sales\RevenuesController::class);
//     });
//     Route::group(['prefix'=>'accounting', 'as' => 'accounting.',],function (){
//         Route::resource('accounts',\App\Http\Controllers\Accounting\AccountsController::class);
//         Route::resource('transactions',\App\Http\Controllers\Accounting\TransactionsController::class);
//         Route::resource('transfers',\App\Http\Controllers\Accounting\TransfersController::class);
//         Route::get('/journal',[\App\Http\Controllers\ReportsController::class,'index'])->name('journal');
//         Route::get('/ledger',[\App\Http\Controllers\ReportsController::class,'index'])->name('ledger');
//     });

//     Route::group(['prefix'=>'reports', 'as' => 'reports.',],function (){
//         Route::get('/',[\App\Http\Controllers\ReportsController::class,'index'])->name('index');
//     });

//     Route::group(['prefix'=>'template', 'as' => 'template.',],function (){
//         Route::get('/clients',[\App\Http\Controllers\TemplatesController::class,'clients'])->name('clients');
//         Route::get('/companies',[\App\Http\Controllers\TemplatesController::class,'companies'])->name('companies');
//         Route::get('/vendors',[\App\Http\Controllers\TemplatesController::class,'vendors'])->name('vendors');

//         Route::get('/elements',[\App\Http\Controllers\TemplatesController::class,'elements'])->name('elements');
//         Route::get('/items',[\App\Http\Controllers\TemplatesController::class,'items'])->name('items');
//         Route::get('/products',[\App\Http\Controllers\TemplatesController::class,'products'])->name('products');

//         Route::get('/bills',[\App\Http\Controllers\TemplatesController::class,'bills'])->name('bills');
//         Route::get('/production-orders',[\App\Http\Controllers\TemplatesController::class,'productionOrders'])->name('production-orders');
//     });

//     Route::group(['prefix'=>'import', 'as' => 'import.',],function (){
//         Route::get('/',[\App\Http\Controllers\ImportController::class,'index'])->name('index');
//         Route::post('/clients',[\App\Http\Controllers\ImportController::class,'clients'])->name('clients');
//         Route::post('/companies',[\App\Http\Controllers\ImportController::class,'companies'])->name('companies');
//         Route::post('/vendors',[\App\Http\Controllers\ImportController::class,'vendors'])->name('vendors');

//         Route::post('/elements',[\App\Http\Controllers\ImportController::class,'elements'])->name('elements');
//         Route::post('/items',[\App\Http\Controllers\ImportController::class,'items'])->name('items');
//         Route::post('/products',[\App\Http\Controllers\ImportController::class,'products'])->name('products');

//         Route::post('/bills',[\App\Http\Controllers\ImportController::class,'bills'])->name('bills');
//         Route::post('/production-orders',[\App\Http\Controllers\ImportController::class,'productionOrders'])->name('production-orders');
//     });
//     Route::group(['prefix'=>'setting', 'as' => 'setting.',],function (){
//         Route::get('/',[\App\Http\Controllers\SettingController::class,'index'])->name('index');

//         Route::get('/default',[\App\Http\Controllers\SettingController::class,'default'])->name('default');
//         Route::get('/company',[\App\Http\Controllers\SettingController::class,'company'])->name('company');
//         Route::get('/invoices',[\App\Http\Controllers\SettingController::class,'invoices'])->name('invoices');
//         Route::get('/working',[\App\Http\Controllers\SettingController::class,'working'])->name('working');
//         Route::get('/taxes',[\App\Http\Controllers\SettingController::class,'taxes'])->name('taxes');

//         Route::post('/store',[\App\Http\Controllers\SettingController::class,'store'])->name('store');

//     });


//     Route::get('notifications',[\App\Http\Controllers\HomeController::class ,'notifications'])->name('notifications');


//     Route::get('test',[\App\Http\Controllers\HomeController::class ,'test'])->name('test');

//     Route::get('404',function (){
//         abort(404);
//     })->name('404');


// });
