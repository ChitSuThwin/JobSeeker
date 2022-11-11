<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    use HasFactory;
    function jobs(){
        return $this->hasMany(Jobs::class, 'categories_id', 'categories_id');
    }

}
