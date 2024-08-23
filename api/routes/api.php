<?php

use App\Http\Middleware\AuthGates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     $user = $request->user();
//     $memberships = $user->memberships;
//     $organisations = [];
//     foreach ($memberships as $membership) {
//         //dd($membership->organisation);
//         $organisations[] = $membership->organisation;
//     }
//     //, 'orginasations' => $organisations, 'memberships' => $memberships, 'organisations' => $organisations
//     return response()->json(['user' => $user], 200);
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('organisations', 'App\Http\Controllers\OrganisationController');
    Route::apiResource('user', 'App\Http\Controllers\UserController');

    /** Membership */
    Route::get('/memberships', ['App\Http\Controllers\Memberships\IndexController', 'index']);
    Route::post('/memberships', ['App\Http\Controllers\Memberships\IndexController', 'select']);
    Route::get('/memberships/edit', ['App\Http\Controllers\Memberships\IndexController', 'edit']);
    Route::put('/memberships/update', 'App\Http\Controllers\Memberships\IndexController@update');
    Route::get('/memberships/addresses', ['App\Http\Controllers\Memberships\AddressController', 'index']);
    Route::post('/memberships/addresses', ['App\Http\Controllers\Memberships\AddressController', 'store']);
    Route::get('/memberships/session', function () {
        $session = session()->get('membership_id') ? "Membership ID: " . session()->get('membership_id') : 'No session';
        return response()->json(['message' => 'success', 'session' => $session], 200);
    });

    /** Organisation Admin */
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/memberships', ['App\Http\Controllers\Admin\MembershipController', 'members']);
        Route::get('/memberships/{id}', ['App\Http\Controllers\Admin\MembershipController', 'show']);
        Route::put('/memberships/{id}', ['App\Http\Controllers\Admin\MembershipController', 'update']);
    });
    // Route::prefix('memberships')->as('memberships.')->group(function () {
    //     Route::get('/', 'App\Http\Controllers\MembershipController@index')->name('index');
    //     Route::post('/', 'App\Http\Controllers\MembershipController@select')->name('select');
    //     Route::get('/{id}', 'App\Http\Controllers\MembershipController@show')->name('show');

    //     Route::delete('/{id}', 'App\Http\Controllers\MembershipController@destroy')->name('destroy');

    //     Route::get('/sessions', function () {
    //         return response()->json(['message' => 'success'], 200);
    //         //return response()->json(['message' => 'success', 'session' => session()->get('membership_id')], 200);
    //     });
    // });
});
Route::get('/test', function () {
    $auth = auth()->user() ? 'Logged in as ' . auth()->user()->email : 'Not logged in';
    $token = csrf_token() ? csrf_token() : 'No token';
    return response()->json(['message' => 'Server is up', 'user' => $auth, 'token' => $token], 200);
});
