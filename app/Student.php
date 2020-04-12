<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
    	'teacher_id','first_name','last_name','birthdate','gender','contact_mobile','contact_email','avatar'
    ];
    
     public function teacher(){
	    return $this->belongsTo(Teacher::class,'teacher_id','id');
	}

}
