<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('dashboard.contact.index');
    }

    // public function show($id)
    // {

    // }

    public function create()
    {
        return view('dashboard.contact.create');
    }

    // public function store(Request $request)
    // {

    // }
}
