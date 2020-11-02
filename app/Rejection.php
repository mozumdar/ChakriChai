<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    protected $fillable = [
        'user_id','application_id','job_title','job_position','company_name'
    ];
}
