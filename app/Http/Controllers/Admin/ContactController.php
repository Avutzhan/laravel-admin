<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ContactController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.contacts.index')->withContacts($contacts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'number'=>'required',
            'email'=>'required',
            'comment'=>'required'
        ]);

        $contact = new Contact([
            'name' => $request->get('name'),
            'number' => $request->get('number'),
            'email' => $request->get('email'),
            'comment' => $request->get('comment'),
        ]);

        $contact->save();

        return redirect('/')->with('success', 'Contact saved!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/admin/call-back')->with('success', 'Contact deleted!');
    }
}
