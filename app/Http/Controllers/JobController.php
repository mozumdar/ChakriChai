<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Category;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\User;
use App\Post;
use App\Setting;
use App\Application;
use App\Profile;
use App\Rejection;
use PDF;

class JobController extends Controller
{   
    public function __construct(){
        $this->middleware(['employer'],['except'=>array('index','show','apply','allJobs')]);
    }

    public function index(){
        $jobs=Job::latest()->limit(10)->where('status',1)->get();
        $companies = Company::latest()->limit(12)->get();
        $posts = Post::where('status',1)->get();
        $categories = Category::with('jobs')->get();
        $settings = Setting::first();
        return view('welcome',compact('jobs','companies','categories','posts','settings'));
    }

    public function show($id,Job $job){
        //dd($job);
        //$job=Job::find($id);
        return view('jobs.show',compact('job'));
    }

    public function company(){
        return view('company.index');
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){ 
    
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $company_name = $company->cname;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'company_name' => $company_name,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'qualification' => request('qualification'),
            'vacancy' => request('vacancy'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
            'experience' =>request('experience'),
            'salary' =>request('salary')
        ]);
        return redirect()->back()->with('message','Job posted successfully!');
    }

    
    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }

    
    public function delete(Request $request){
        $id = $request->get('id');

        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->back();
    }

    public function selectapplicant(Request $request){
        $id = $request->get('id');

        $applicant = Application::findOrFail($id);

        $applicant->status = 1;

        $applicant->save();

        return redirect()->back();
        
    }

    public function seeprofile($id){

        $user = User::findOrFail($id);

        return view('profile.aaindex', compact('user'));
    }

    public function applicantsdelete(Request $request){
        $id = $request->get('id');

        $applicant = Application::findOrFail($id);
        
        $application_id = $applicant->id;
        $user_id = $applicant->user_id;
        $job_title = $applicant->job_title;
        $job_position = $applicant->job_position;
        $company_id = $applicant->company_id;
        $company_name = $applicant->company_name;

        Rejection::create([
            'user_id' => $user_id,
            'application_id' => $application_id,
            'job_title' => $job_title,
            'job_position' => $job_position,
            'company_id' => $company_id,
            'company_name' => $company_name,
        ]);

        $applicant->delete();

        return redirect()->back();

    }

    public function update(JobPostRequest $request,$id){
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message','Job Sucessfully Updated!');
    }
    
    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        
        $users = User::find(Auth::user()->id);

        $user_profile = $users->profile;

        
        $user_name = $users->name;
        $user_email =  $users->email;
        $user_id = $users->id;

        $job_id = $jobId->id;
        $job_title = $jobId->title;
        $job_position = $jobId->position;

        $company_id = $jobId->company_id;
        $company_name = $jobId->company_name;
          
        $user_phone = $user_profile->phone_number;
        $user_resume = $user_profile->resume;
        $user_coverletter = $user_profile->cover_letter;
        $user_avatar = $user_profile->avatar;


        Application::create([
            'user_id' => $user_id,
            'job_id' => $job_id,
            'job_title' =>$job_title,
            'job_position' =>$job_position,
            'company_id' => $company_id,
            'company_name' => $company_name ,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone,
            'user_resume' => $user_resume,
            'user_coverletter' => $user_coverletter,
            'user_avatar' => $user_avatar
        ]);

        return redirect()->back()->with('message','Application sent!');
    }

    public function applicant(){

        $user = User::find(Auth::user()->id);
        $user_id = $user->id;

        $company = Company::whereUserId($user_id)->first();
        $company_id = $company->id;

        $applications = Application::whereCompanyId($company_id)->get();

        
        
        return view('jobs.applicants',compact('applications'));

    }

    public function selectedApplicant(){

        $user = User::find(Auth::user()->id);
        $user_id = $user->id;

        $company = Company::whereUserId($user_id)->first();
        $company_id = $company->id;

        $applications = Application::whereCompanyId($company_id)->get();

        $appli = Application::whereCompanyId($company_id)->first();

        return view('jobs.selectedapplicants',compact('applications','appli'));
    }

    public function genpdf(){

        $user = User::find(Auth::user()->id);
        $user_id = $user->id;

        $company = Company::whereUserId($user_id)->first();
        $company_id = $company->id;

        $applications = Application::whereCompanyId($company_id)->get();

        $appli = Application::whereCompanyId($company_id)->first();

        $pdffile = PDF::loadView('selectedapplicants', ['appli'=>$appli,'applications'=>$applications]);

        return $pdffile->download('ResultPdf.pdf');
    }


    public function allJobs(Request $request){

        $search = $request->get('search');
        $address1 = $request->get('address1');

        if($search && $address1 ){
            $jobs = Job::where('position','LIKE','%'.$search.'%')
                ->orWhere('type','LIKE','%'.$search.'%')
                ->orWhere('title','LIKE','%'.$search.'%')
                ->orWhere('address','LIKE','%'.$address1.'%')
                ->paginate(10);
            return view('jobs.alljobs',compact('jobs'));    
        }

        $keyword = $request->get('position');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        if($keyword||$type||$category||$address){
            $jobs = Job::where('position','LIKE','%'.$keyword.'%')
                        ->orWhere('type',$type)
                        ->orWhere('category_id',$category)
                        ->orWhere('address',$address)
                        ->paginate(10);
                        return view('jobs.alljobs',compact('jobs'));
        }else{
            $jobs = Job::latest()->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
        }
    }    
}
