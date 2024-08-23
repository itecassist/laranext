<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user = auth()->user();

        // if ($user) {
        //     $roles            = Role::with('permissions')->get();
        //     $permissionsArray = [];

        //     foreach ($roles as $role) {
        //         foreach ($role->permissions as $permissions) {
        //             $permissionsArray[$permissions->access][] = $role->id;
        //         }
        //     }
        //     //dd($permissionsArray);
        //     foreach ($permissionsArray as $title => $roles) {

        //         Gate::define($title, function (\App\Models\Member $member) use ($roles) {
        //             return count(array_intersect($member->roles->pluck('id')->toArray(), $roles)) > 0;
        //         });
        //     }
        // }
        return $next($request);
    }
}
