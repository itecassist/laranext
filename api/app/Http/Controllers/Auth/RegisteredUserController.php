<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:50'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['nullable', 'date'],
            'mobile_phone' => ['required', 'string', 'max:30'],
            'gender' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'date_of_birth' => $request->date_of_birth ?? null,
            'mobile_phone' => $request->mobile_phone,
            'gender' => $request->gender ?? 'other',
            'last_login_at' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->json(['message' => 'Registration successful', 'user' => $user], 201);
    }

    /**
     * Handle an incoming organisation registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeOrganisation(Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:50'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['nullable', 'date'],
            'mobile_phone' => ['required', 'string', 'max:30'],
            'gender' => ['nullable', 'string'],
        ]);
        if (!auth()->check()) {
            $user = User::create([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->string('password')),
                'date_of_birth' => $request->date_of_birth ?? null,
                'mobile_phone' => $request->mobile_phone,
                'gender' => $request->gender ?? 'other',
                'last_login_at' => now(),
            ]);

            event(new Registered($user));

            Auth::login($user);
        }


        // Create organisation
        $organisation = Organisation::create([
            'creator_id' => auth()->id(),
            'name' => $request->organisation_name,
            'seo_name' => Str::slug($request->organisation_name),
            'email' => $request->organisation_email,
            'phone' => $request->organisation_phone,
            'website' => $request->website ?? null,
            'description' => $request->description ?? null,
            'is_active' => true,
        ]);

        Member::create([
            'user_id' => auth()->id(),
            'organisation_id' => $organisation->id,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'date_of_birth' => $request->date_of_birth ?? null,
            'mobile_phone' => $request->mobile_phone,
            'gender' => $request->gender ?? 'other',
            'last_login_at' => now(),
            'member_number' => '1',
            'joined_at' => now(),
            'roles' => 'owner',
            'is_active' => true,
        ]);

        return response()->json(['message' => 'Registration successful and Organisation created', 'user' => $user], 201);
    }
}
