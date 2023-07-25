<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    public static function created($request)
    {
        $contact = new Contact();
        $contact['title'] = $request['title'];
        $contact['subject'] = $request['subject'];
        $contact['email'] = $request['email'];
        $contact['name'] = $request['name'];
        $contact['label'] = $request['label'];
        $contact['text'] = $request['text'];

        try {
            $contact->save();

            $response['success'] = true;
            return $response;

        } catch (\Throwable $th) {
            $response['success'] = false;
            return $response;
        }
    }
}
