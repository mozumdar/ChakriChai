<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id','status','job_id','job_title','job_position','company_id','company_name','user_name','user_email','user_phone','user_resume','user_coverletter','user_avatar'
    ]; 
}
