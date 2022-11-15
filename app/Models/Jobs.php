<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $guarded = [];
    function categories(){
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }
    function employeecategory(){
        return $this->belongsToMany(EmployeeCategory::class,'employee_categories');
    }
    function employees(){
        return $this->belongsToMany(Employee::class, 'jobs_employee');
    }
    function notifications()
    {
        # code...\
        return $this->hasMany(Notifications::class,'jobs_id','id');
    }
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans(),
           
        );
    }
    function endDate():Attribute
    {
      return  Attribute::make(
          
          get: fn ($value) =>Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y'),
      );
    }
}
