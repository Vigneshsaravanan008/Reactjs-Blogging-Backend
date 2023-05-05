<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        if (!empty(Auth::guard('admin')->user()->id)) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = ['email' => 'required|email|max:255', 'password' => 'required',];

            $customMessages = ['email.required' => 'Please enter your Email to Login ', 'email.email' => ' Please enter correct Email to login', 'password.required' => ' Please enter correct Password to login'];

            $this->validate($request, $rules, $customMessages);

            $remember_me =  (!empty($request->remember_me)) ? TRUE : FALSE;

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']], $remember_me)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('warning', 'Check Given Credentials');
            }
        }

        return view('admin.auth.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function filemanager()
    {
        return view('admin.filemanager');
    }

    public function mailbox()
    {
        return view('admin.mailbox');
    }
}
