<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CallBackController extends Controller
{
    use ValidatesRequests;

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        //dd('test');
        if (Auth::guard('admins')->guest()) {
            return redirect()->route('admin.get.login');
        }

        $calls = Call::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.calls.index')->withCalls($calls);
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
        ]);

        $request->validate([
            'name'=>'required',
            'number'=>'required'
        ]);

        $contact = new Call([
            'name' => $request->get('name'),
            'number' => $request->get('number'),
        ]);
        $contact->save();

        if ($validator->passes()) {

            return response()->json(['success'=>trans('validation.success')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

        //return response()->json(['success'=>'Form is successfully submitted!']);
        //return redirect('/')->with('success', trans('validation.success'));
        //return redirect('/')->with('success', trans('validation.success'));
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
