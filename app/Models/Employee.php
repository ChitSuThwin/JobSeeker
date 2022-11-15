<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'employee';
    protected $table = 'employee';
    protected $fillable = [
        'name','email','phone','password','address','description','resume','avatar','verify_code', 'is_verify'
    ];

    protected $hidden = ['password'];
    function jobs(){
        return $this->belongsToMany(Jobs::class, 'jobs_employee');
    }

    function notifications()
    {
        # code...\
        return  $this->hasMany(Notifications::class,'employee_id','id');
    }

    function categories()
    {
        return $this->belongsToMany(Categories::class,'employee_categories');
    }
    public function createdAt():Attribute
    {
        # code...
return Attribute::make
(
    get:fn ($value) => Carbon::parse($value)->diffForHumans(),
           
);
}
}