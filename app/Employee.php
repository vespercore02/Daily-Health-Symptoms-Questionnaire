<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function emp_infos()
    {
        return $this->belongsTo(Emp_info::class, 'user_id');
    }
}
