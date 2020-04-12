<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
    	'full_name','birthday','gender','contact_mobile','contact_mail','class','avatar'
    ];

    public function students(){
	    return $this->hasMany(Student::class);
	}
	
}
