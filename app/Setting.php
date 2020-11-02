<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'about',
        'contact_number',
        'contact_name'
    ];
}
