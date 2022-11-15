<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];

    function jobs(){
        return $this->hasMany(Jobs::class, 'categories_id', 'id');
    }

    function employee()
    {
        return $this->belongsToMany(Employee::class,'employee_categories');
    }
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans(),
           
        );
    }
}
