<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;

class CompanyController extends Controller
{   
    public function __construct(){
        $this->middleware(['employer'],['except'=>array('index','company')]);
    }

    //route model binding
    public function index($id ,Company $company){
        $jobs = Job::where('user_id',$id)->get();
        return view('company.index',compact('company'));
    }

    public function company()
    {
        $companies = Company::paginate(8);
        return view('company.company',compact('companies'));
    }
    
    public function create(){
        return view('company.create');
    }
    public function store(Request $request){

        $this->validate($request,[
            'address'=>'required',
            'phone'=>'required|min:10|numeric',
            'description'=>'required|min:10', 

        ]);
        
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'website'=> request('website'),
            'slogan'=> request('slogan'),
            'description'=> request('description'),
            
        ]);
        return redirect()->back()->with('message',
        'Company Sucessfully Updated!');
    }

    public function notice(Request $request){

        $this->validate($request,[
            'notice'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id = auth()->user()->id;

        $notice = $request->file('notice')->store('public/files');

        Company::where('user_id',$user_id)->update([
            'notice'=> $notice,
        ]);

        return redirect()->back()->with('message',
        'Notice Sucessfully Updated!');
    }
    
    public function logo(Request $request){
        $this->validate($request,[
            'logo'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo',$filename);
            Company::where('user_id',$user_id)->update([
                'logo'=>$filename
            ]);
            return redirect()->back()->with('message','Logo Successfully updated');
        }
    }
    
    public function change(){
        return view('company.change');
    }

}
