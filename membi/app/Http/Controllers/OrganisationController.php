<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function index()
    {
        $data = Organisation::where('is_public', 1)->paginate();
        return view('organisations.index', compact('data'));
    }
}
