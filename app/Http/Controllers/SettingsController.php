<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;

class SettingsController extends Controller
{
    public function index(){
        return view('admin.setting')->with('settings', Setting::first());
    }

    public function update(){
        $this->validate(request(), [
            'about'=>'required',
            'contact_number'=>'required',
            'contact_email'=>'required'
        ]);

        $settings = Setting::first();

        $settings->about = request()->about;

        $settings->contact_number = request()->contact_number;

        $settings->contact_email = request()->contact_email;

        $settings->save();

        return redirect()->back();

    }

    public function addCategory(){
        return view('admin.createcategory');
    }

    public function categoryStore(){
        $this->validate(request(), [
            'name'=>'required'
        ]);

        Category::create([
            'name' => request('name')
        ]);

        return redirect()->back();
    }
}
