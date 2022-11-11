<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'jobs_id','employee_id','is_read'
    ];
   
    public function jobs()
    {
        # code...
       return $this->belongsTo(Jobs::class,'jobs_id','id');
    }
    public function employee()
    {
        # code...
      return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
