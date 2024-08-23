<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $request->user()->update(['last_login_at' => now()]);
        $memberships = Auth()->user()->memberships->load('organisation'); //'user' => $request->user(),
        return response()->json(['message' => 'Login successful', 'user' => $request->user()], 200);
    }

    /**
     * Handle an incoming social login request.
     */
    public function socialLogin(LoginRequest $request)
    {
        $request->authenticateSocial();
        $request->session()->regenerate();
        $request->user()->update(['last_login_at' => now()]);
        $memberships = Auth()->user()->memberships->load('organisation'); //'user' => $request->user(),
        return response()->json(['message' => 'Login successful', 'user' => $request->user()], 200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
