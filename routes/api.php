<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use \App\Http\Controllers\Api\Users\UsersController;
use \App\Http\Controllers\Api\System\RolesController;
use \App\Http\Controllers\Api\System\SettingController;
use \App\Http\Controllers\Api\System\DashboardController;
use App\Http\Controllers\Api\System\LookupController;
use App\Http\Controllers\FUserController;
use App\Http\Controllers\Api\Hr\UsersController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\FirebaseController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OffersController;
use App\Http\Controllers\Api\VendorInfoController;


Route::group(['prefix' => 'flutter' ], function () {
    
    Route::post('saveUser', [UsersController::class, 'store']);
    // Route::get('listUsers', [UsersController::class, 'index']);
    Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('checkverifycode', [\App\Http\Controllers\Api\AuthController::class, 'verifyCode']);

    // Route::post('checkverifycodeReset', [\App\Http\Controllers\Api\AuthController::class, 'verifyCode_resetpassword']);
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('forgetPassword', [\App\Http\Controllers\Api\AuthController::class, 'forgetPassword']);
    Route::post('resetPassword', [\App\Http\Controllers\Api\AuthController::class, 'reset_Password']);
    
    // 'middleware'=>['auth:api', 'json.response']
    Route::group(['prefix'=>'home'], function () {
        Route::post('get_all_data',[HomeController::class,'allData']);
        
    });
    Route::group(['prefix'=>'category'], function () {
        Route::post('get_categories',[CategoryController::class,'index']);
        // Route::post('storeCategory/{category?}',[CategoryController::class,'storeCategory']);
    });

    Route::group(['prefix'=>'item'], function () {
        Route::post('get_items',[ItemController::class,'index']);
        Route::post('get_cat_items',[ItemController::class,'cat_items']);
        // Route::post('storeItem/{item?}',[ItemController::class,'storeItem']);
        Route::post('AddRemoveFavorite',[ItemController::class,'AddRemoveFavorite']);
        Route::post('getFavoritesItems',[ItemController::class,'getFavoritesItems']);
        Route::post('searchItems',[ItemController::class,'search']);
    });
    
    Route::group(['prefix'=>'cart'], function () {
        Route::post('addToCart',[CartController::class,'addToCart']);
        Route::post('removeFromCart',[CartController::class,'removeFromCart']);
        Route::post('indexCart',[CartController::class,'indexCart']);
        Route::post('countItemCart',[CartController::class,'countItemCart']);

    });

    Route::group(['prefix'=>'address'], function () {
        Route::post('addAddress',[AddressController::class,'AddAddress']);
        Route::post('IndexAddress',[AddressController::class,'IndexAddress']);
        Route::post('deleteAddress',[AddressController::class,'deleteAddress']);

    });

    Route::group(['prefix'=>'coupon'], function () {
        Route::post('CheckCoupon',[CouponController::class,'CheckCoupon']);
        Route::post('addCoupon',[CouponController::class,'addCoupon']);
        Route::post('deleteCoupon',[CouponController::class,'deleteCoupon']);

    });

    Route::group(['prefix'=>'order'], function () {
        Route::post('AddOrder',[OrderController::class,'AddOrder']);
        Route::post('IndexOrders',[OrderController::class,'IndexOrders']);
        Route::post('OrderDetails',[OrderController::class,'OrderDetails']);
        Route::post('deleteOrder',[OrderController::class,'deleteOrder']);
        
        Route::post('ArchivedOrders',[OrderController::class,'ArchivedOrders']);
        
        Route::post('ratingOrder',[OrderController::class,'ratingOrder']);

    });

    Route::group(['prefix'=>'notification'], function () {
        Route::post('sendNot',[FirebaseController::class,'sendNotification']);
        Route::post('getNotif',[NotificationController::class,'getNotification']);

    });

    Route::group(['prefix'=>'offer'], function () {
        Route::post('offersData',[OffersController::class,'offersData']);

    });

});

Route::group(['prefix' => 'admin' ], function () {

    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'adminLogin']);
    Route::group(['middleware' => ['auth:api']], function()  {

        Route::post('listUsers', [UsersController::class, 'index']);
        Route::post('users/{id}', [UsersController::class, 'show']);

        
    Route::group(['prefix'=>'notification'], function () {
        Route::post('sendNot',[FirebaseController::class,'sendNotification']);
        Route::post('adminGetNotif',[NotificationController::class,'adminNotification']);

    });
        Route::group(['prefix'=>'order'], function () {
            Route::post('approve',[AdminController::class,'approveOrderedItem']);
            Route::post('adminOrderedItems',[AdminController::class,'adminOrderedItems']);
    
        });
    
        Route::group(['prefix'=>'category'], function () {
            Route::post('get_categories',[CategoryController::class,'index']);
            Route::post('storeCategory/{category?}',[CategoryController::class,'storeCategory']);
        });
    
        
        Route::group(['prefix'=>'item'], function () {
            Route::post('admin_get_items',[ItemController::class,'adminIndex']);
            Route::post('admin_get_archived_items',[ItemController::class,'adminArchivedItems']);
            Route::post('get_cat_items',[ItemController::class,'cat_items']);
            Route::post('storeItem/{item?}',[ItemController::class,'storeItem']);
            Route::post('AddRemoveFavorite',[ItemController::class,'AddRemoveFavorite']);
            Route::post('getFavoritesItems',[ItemController::class,'getFavoritesItems']);
            Route::post('searchItems',[ItemController::class,'search']);
            Route::post('deleteItem/{item?}',[ItemController::class,'deleteItem']);
            Route::post('restoreItem/{item?}',[ItemController::class,'restoreDeletedItem']);
        });
        Route::group(['prefix'=>'vendor'], function () {
            Route::post('storeData/{vendor?}',[VendorInfoController::class,'storeData']);
            Route::post('getData',[VendorInfoController::class,'getData']);
        });
    } );
    

});

Route::get('categories/image/{img}/{no_cache}', [CategoryController::class, 'categoriesImages'])->name('category_image');
Route::get('items/image/{folder}/{img}/{no_cache}', [ItemController::class, 'itemsImages'])->name('item_image');

Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

// Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);


Route::post('reg', [\App\Http\Controllers\Api\AuthController::class, 'reg']);

Route::get('docs', [\App\Http\Controllers\Api\AuthController::class , 'docs'])->name('docs');

Route::group(['middleware'=>['auth:api', 'json.response']], function () {

    // Route::post('invite', [\App\Http\Controllers\Api\Hr\UsersController::class , 'process'])->name('process');

    Route::post('users/logout', [\App\Http\Controllers\Api\DashboardController::class, 'logout']);

    Route::post('profile/', [\App\Http\Controllers\Api\DashboardController::class, 'profile'])->name('profile');
    Route::post('profile/update', [\App\Http\Controllers\Api\DashboardController::class, 'profileUpdate'])->name('profile-update');
    Route::post('notifications/', [\App\Http\Controllers\Api\DashboardController::class, 'notifications'])->name('notifications');
    Route::post('notifications/read', [\App\Http\Controllers\Api\DashboardController::class, 'markAsRead'])->name('notifications');

    Route::post('unread-notifications/', [\App\Http\Controllers\Api\DashboardController::class, 'unreadNotifications'])->name('unread-notifications');

    Route::get('roles/permissions',[\App\Http\Controllers\Api\Hr\RolesController::class,'permissions'])->name('roles.permissions');
    Route::post('roles/permissions',[\App\Http\Controllers\Api\Hr\RolesController::class,'permissionsCreate']);
    Route::delete('permission/delete/{id}',[\App\Http\Controllers\Api\Hr\RolesController::class,'permissionsDelete'])->name('permission.delete');

//    Route::resource('users',\App\Http\Controllers\Api\Hr\UsersController::class);
//    Route::resource('roles',\App\Http\Controllers\Api\Hr\RolesController::class);

//   Route::resource('employees',\App\Http\Controllers\Api\Hr\EmployeesController::class);




});
//
//Route::group(['prefix' => '', 'middleware' => ['auth:api', 'json.response']], function () {
//    Route::post('lookups/index', [LookupController::class, 'index']);
//});
//
//
//
//Route::group(['prefix' => '', 'middleware' => ['json.response']], function () {
//    Route::post('login', [UsersController::class, 'login']);
//    Route::get('{user}', [UsersController::class, 'get']);
//    Route::get('photo/{user}', [UsersController::class, 'photo']);
//});
//
///*
//|--------------------------------------------------------------------------
//| Hr API
//|--------------------------------------------------------------------------
//*/
//
// Route::group(['prefix' => 'users', 'middleware' => ['auth:api', 'json.response']], function () {

//     Route::post('', [UsersController::class, 'users']);
//     Route::put('{user?}', [UsersController::class, 'put']);
//     Route::put('set/access/{user}', [UsersController::class, 'setAccess']);
//     Route::post('photo/{user?}', [UsersController::class, 'updatePhoto']);
//     Route::get('profile', [UsersController::class, 'details']);
//     Route::get('{user?}', [UsersController::class, 'details']);
//     Route::put('password/{user?}', [UsersController::class, 'changePassword']);
//     Route::delete('{user}', [UsersController::class, 'remove']);
//     Route::post('reset/{user}', [UsersController::class, 'reset']);
//     Route::post('restore/{user}', [UsersController::class, 'restore']);
//     Route::post('logout', [UsersController::class, 'logout']);
//     Route::post('notifications/', [\App\Http\Controllers\Api\DashboardController::class, 'notifications']);

// });

//Route::group(['prefix' => 'employees', 'middleware' => ['auth:api', 'json.response']], function () {
//
//    Route::post('', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'index']);
//    Route::put('{employee?}', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'put']);
//
//});

///*
//|--------------------------------------------------------------------------
//| Settings API
//|--------------------------------------------------------------------------
//*/
//
//Route::group(['prefix' => 'settings', 'middleware' => ['auth:api', 'json.response']], function () {
//    Route::post('', [SettingController::class, 'settings']);
//    Route::put('{setting?}', [SettingController::class, 'put']);
//    Route::get('{setting}/{details?}', [SettingController::class, 'get']);
//    Route::delete('{setting}', [SettingController::class, 'remove']);
//});

/*
|--------------------------------------------------------------------------
| Roles API
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'roles', 'middleware' => ['auth:api', 'json.response']], function () {

    Route::post('', [RolesController::class, 'roles']);
    Route::get('{role?}', [RolesController::class, 'get']);
    Route::put('{role?}', [RolesController::class, 'put']);
    Route::delete('{role}', [RolesController::class, 'delete']);
    Route::put('user/{user}', [RolesController::class, 'sync']);
    Route::get('user/{user}', [RolesController::class, 'user']);

});


/*
|--------------------------------------------------------------------------
| Employees API
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'employees', 'middleware' => ['auth:api', 'json.response']], function () {
    Route::post('', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'list']);
    Route::get('/create', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'create']);
    Route::get('access/{employee?}', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'show']);
    Route::put('{employee?}', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'put']);
    Route::delete('{employee}', [\App\Http\Controllers\Api\Hr\EmployeesController::class, 'destroy']);
});


/*
|--------------------------------------------------------------------------
| Accounting API
|--------------------------------------------------------------------------
*/

Route::group([ 'middleware' => ['auth:api', 'json.response']], function () {
    Route::post('accounts/tree', [\App\Http\Controllers\Api\Accounting\AccountsController::class, 'tree']);
    Route::post('entries', [\App\Http\Controllers\Api\Accounting\EntriesController::class, 'index']);
    Route::get('entries/create', [\App\Http\Controllers\Api\Accounting\EntriesController::class, 'create']);
    Route::put('entries/store', [\App\Http\Controllers\Api\Accounting\EntriesController::class, 'store']);
});


/*
|--------------------------------------------------------------------------
| Purchases API
|--------------------------------------------------------------------------
*/

Route::group([ 'middleware' => ['auth:api', 'json.response']], function () {
    Route::post('bills', [\App\Http\Controllers\Api\Purchases\BillsController::class, 'index']);
    Route::get('bills/create', [\App\Http\Controllers\Api\Purchases\BillsController::class, 'create']);
    Route::post('bills/search-vendor', [\App\Http\Controllers\Api\Purchases\BillsController::class, 'searchVendor']);
    Route::post('bills/search-item', [\App\Http\Controllers\Api\Purchases\BillsController::class, 'searchProduct']);

    Route::put('bills/store', [\App\Http\Controllers\Api\Purchases\BillsController::class, 'store']);

    Route::post('payments', [\App\Http\Controllers\Api\Purchases\PaymentsController::class, 'index']);
    Route::get('payments/create', [\App\Http\Controllers\Api\Purchases\PaymentsController::class, 'create']);
    Route::put('payments/store', [\App\Http\Controllers\Api\Purchases\PaymentsController::class, 'store']);

    Route::post('vendors', [\App\Http\Controllers\Api\Purchases\VendorsController::class, 'list']);
    Route::get('vendors/create', [\App\Http\Controllers\Api\Purchases\VendorsController::class, 'create']);
    Route::post('vendors/get-states', [\App\Http\Controllers\Api\Purchases\VendorsController::class, 'getStates']);
    Route::put('vendors/{vendor?}', [\App\Http\Controllers\Api\Purchases\VendorsController::class, 'store']);

});




