<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ContactController extends Controller
{
    use ValidatesRequests;

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (Auth::guard('admins')->guest()) {
            return redirect()->route('admin.get.login');
        }

        $contacts = Contact::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.contacts.index')->withContacts($contacts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ]);

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

        if ($validator->passes()) {

            return response()->json(['success'=>trans('validation.success')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);


//        return redirect('/')->with('success', 'Contact saved!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/admin/contacts')->with('success', 'Contact deleted!');
    }
}
