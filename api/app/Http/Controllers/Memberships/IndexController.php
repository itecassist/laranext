<?php

namespace App\Http\Controllers\Memberships;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Member::with('organisation')->where('user_id', auth()->id())->get();
        return response()->json(['data' => $data], 200);
    }

    public function select(Request $request)
    {
        $data = Member::where('user_id', auth()->id())->where('id', $request->membership_id)->first();
        if ($data) {
            session(['membership_id' => $request->membership_id]);
            session(['organisation_id' => $data->organisation_id]);
            return response()->json(['data' => $data], 200);
        } else {
            return response()->json(['message' => 'Membership not found'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
