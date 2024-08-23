<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MembershipController extends Controller
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

    public function addresses()
    {
        $addresses = Member::where('id', session()->get('membership_id'))->first()->addresses;
        return response()->json(['data' => $addresses], 200);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $data = Member::where('id', session()->get('membership_id'))->first();
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request)
    {
        $request->validated();
        $data = Member::where('id', session()->get('membership_id'))->first();
        if ($data->update($request->all())) {
            return response()->json(['message' => 'success', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'failed'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
