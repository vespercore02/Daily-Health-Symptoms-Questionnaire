<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_info extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
