<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CallBackController extends Controller
{
    use ValidatesRequests;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $calls = Call::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.calls.index')->withCalls($calls);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $contact = new Call([
            'name' => $request->get('name'),
            'number' => $request->get('number'),
        ]);
        $contact->save();
        return redirect('/')->with('success', 'Contact saved!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $contact = Call::find($id);
        $contact->delete();

        return redirect('/admin/call-back')->with('success', 'Contact deleted!');
    }
}
