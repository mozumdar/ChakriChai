<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Job;
use App\Company;
use App\Application;

class ApplicationsController extends Controller
{
    public function store($id){ 
        
        $job = Job::find($id);
        $users = User::find(Auth::user()->id);

        $user_id = $users->id;
        $job_id = $job->id;
        $company_id = $job->company_id;
        $company_name = $job->company_name;

        Application::create([
            'user_id' => $user_id,
            'job_id' => $job_id,
            'company_id' => $company_id,
            'company_name' => $company_name  
        ]);

        return redirect()->back();
    }
}
