<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'company' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $response = User::edit($request, Auth::user()->id);

        if ($response['success']) {
            return redirect()->back()->with('success', 'Perfil editado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Algo deu errado ao atualizar seu perfil!');
        }
    }
}
