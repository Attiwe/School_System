<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Storage;

class SettingsController extends Controller
{
    // public function index(){
    //     $collection = Settings::all();
    //     $setting = $collection->flatMap(function($coll){
    //          return [$coll->key => $coll->value];
    //     });
    //     return $setting;
    // }

    public function index()
    {
        $collection['settings'] = Settings::pluck('value', 'key');
        return view('pages.settings.index_setting', $collection);
    }



    public function update(Request $request)
    {
        $settings = $request->except('_token', '_method','logo');
        foreach ($settings as $key => $setting) {
            Settings::where('key', $key)->update(['value' => $setting]);
        }


        if ($request->hasfile('logo')) {
            $file = $request->file('logo');

            $filename = $file->getClientOriginalName();
            $imagePath = $file->storeAs('attachments_setting/logo', $filename, 'public');
            Settings::where('key', 'logo')->update(['value' => $imagePath]);
        }

        toastr()->success('تم التحديث بنجاح');

        return redirect()->back();


    }

}
