<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use App\Models\OrganisationConfig;
use App\Models\OrganisationRole;
use Illuminate\Support\Facades\DB;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Organisation::where('is_active', true)->where('is_public', true)->paginate();
        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganisationRequest $request)
    {
        $request->validated();
        $request->merge([
            'creator_id' => auth()->id(),
            'free_trail' => true,
            'free_trail_end_date' => now()->addMonths(3),
            'is_active' => true
        ]);
        try {
            DB::beginTransaction();
            // Create a new organisation
            $organisation = Organisation::create($request->all());
            // OrganisationRole::create([
            //     'organisation_id' => $organisation->id,
            //     'role' => 'super-admin',
            //     'description' => 'Super Admin of the organisation',
            //     'permissions' => json_encode([''])
            // ]);
            // OrganisationConfig::factory()->create([
            //     'organisation_id' => $organisation->id,
            // ]);
            // Add the creator as a member
            $organisation->members()->create([
                'user_id' => auth()->id(),
                'organisation_id' => $organisation->id,
                'title' => auth()->user()->title,
                'first_name' => auth()->user()->first_name,
                'last_name' => auth()->user()->last_name,
                'email' => auth()->user()->email,
                'mobile_phone' => auth()->user()->mobile_phone,
                'date_of_birth' => auth()->user()->date_of_birth,
                'gender' => auth()->user()->gender,
                'member_number' => '1',
                'joined_at' => now(),
                'is_active' => true,
                'roles' => json_encode('super-admin'),
                'last_login_at' => now(),
            ]);
            DB::commit();
            return response()->json(['message' => 'Organisation created', 'organisation' => $organisation], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Organisation not created', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisation $organisation)
    {
        return response()->json(['data' => $organisation], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganisationRequest $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
