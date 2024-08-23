<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateMembershipRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function members()
    {
        $data = Member::where('organisation_id', session()->get('organisation_id'))->paginate();
        return response()->json(['data' => $data], 200);
    }

    public function show($id)
    {
        $data = Member::where('organisation_id', session()->get('organisation_id'))->find($id);
        return response()->json(['data' => $data], 200);
    }

    public function update(UpdateMembershipRequest $request, $id)
    {

        $request->validated();
        $data = Member::where('organisation_id', session()->get('organisation_id'))->find($id);
        if ($data->update($request->all())) {
            return response()->json(['message' => 'Data updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Data update failed'], 400);
        }
    }
}
