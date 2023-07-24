<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function edit($request, $id)
    {
        $profile = User::find($id);
        $profile['name'] = $request['name'];
        $profile['email'] = $request['email'];
        $profile['company'] = $request['company'];

        if ($request['password'] != null || $request['password'] != '') {
            $profile['password'] = Hash::make($request['password']);
        }

        if ($request['file']){

            if ($profile['image']) {
                unlink($profile['image']);
            }

            if ($request->hasFile('file')) {
                $image = $request->file('file');


                $name =  "imagem-".Auth::user()->id. '.' . $image->getClientOriginalExtension();
                $request->file('file')->move(public_path('dist/img/profile/'), $name);

                $profile['image'] = 'dist/img/profile/' . $name;
            }
        }


        try {
            $profile->save();

            return ['success' => true];

        } catch (\Throwable $th) {
            return ['success' => false];
        }
    }
}
