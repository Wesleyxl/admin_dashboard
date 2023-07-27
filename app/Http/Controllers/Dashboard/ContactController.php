<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $read = Contact::select('id')->where('is_read', 1)->get()->all();
        $unread = Contact::select('id')->where('is_read', 0)->get()->all();
        $unreads = Contact::orderBy('id', 'desc')->where('is_read', 0)->get()->all();
        $reads = Contact::orderBy('id', 'desc')->where('is_read', 1)->paginate(10);

        return view('dashboard.contact.index', array(
            'read' => $read,
            'unread' => $unread,
            'unreads' => $unreads,
            'reads' => $reads
        ));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        $contact['is_read'] = 1;
        $contact->save();

        return view('dashboard.contact.edit', array(
            'contact' => $contact
        ));
    }

    public function create()
    {
        $read = Contact::select('id')->where('is_read', 1)->get()->all();
        $unread = Contact::select('id')->where('is_read', 0)->get()->all();

        return view('dashboard.contact.create', array(
            'read' => $read,
            'unread' => $unread
        ));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|string',
            'subject' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string|email',
            'text' => 'required|string|min:5',
            'label' => 'required'
        ]);

        if ($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation->errors());
        }

        $response = Contact::created($request->all());

        if ($response['success']) {

            return redirect('/dashboard/contato')->with('success', "Contato cadastrado com sucesso");
        }

        return redirect('/dashboard/contato')->with('error', "Algo deu errado ao cadastrar o contato");
    }

    public function label($label)
    {
        $read = Contact::select('id')->where('is_read', 1)->get()->all();
        $unread = Contact::select('id')->where('is_read', 0)->get()->all();
        $unreads = Contact::where('is_read', 0)->where('label', $label)->get()->all();
        $reads = Contact::where('is_read', 1)->where('label', $label)->paginate(10);


        return view('dashboard.contact.index', array(
            'read' => $read,
            'unread' => $unread,
            'unreads' => $unreads,
            'reads' => $reads
        ));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/dashboard/contato')->with('warning', "Contato apagado com sucesso");
    }
}
