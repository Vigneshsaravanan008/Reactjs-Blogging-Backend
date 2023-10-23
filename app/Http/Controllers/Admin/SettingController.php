<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        $setting=Setting::first();
        return view('settings.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $datas = $request->except('_token','id','logo_path','favicon_path','white_favicon_icon_path','home_path');

        if( $request->hasFile('logo') )
        {
            $files = request()->file('logo');
            $file_name = str_replace(" ", "-", $files->getClientOriginalName());
            $file_arr  = Helper::upload_files($file_name, 'logo', '');
            $files->move($file_arr['path'], $file_arr['file_name']);
            $image_path = 'uploads/'.$file_arr['db_path'];
            $datas['logo'] = $image_path ;
        }else{
            $data['logo']=request('logo_path');
        }

        Setting::updateOrCreate(['id'=>$request->id],$datas);
        return redirect()->route('general.settings');
    }
}
