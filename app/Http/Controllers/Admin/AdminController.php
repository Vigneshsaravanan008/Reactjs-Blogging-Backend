<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ToEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return view('auth.login');
    }

    public function dashboard()
    {
        // $salt = substr(hash('sha256', env('APP_KEY')), 0, 16);
        // $data = DB::table('admins')->whereRaw("CONVERT(AES_DECRYPT(FROM_BASE64(email), '{$salt}') USING utf8mb4) = 'admin@gmail.com' ");
        return view('home');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function profileupdate(Request $request)
    {
        Admin::where('id', Auth::guard('admin')->user()->id)->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone_no' => request('phone_no'),
        ]);

        return back()->with('success', 'Profile Updated Successfully');
    }

    public function passwordsettings(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt(request('password'))]);
        return back()->with('success', 'Password Updated Successfully');
    }
}
