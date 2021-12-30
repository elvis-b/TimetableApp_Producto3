<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table ='course';
	protected $primaryKey = 'id_course';
	protected $fillable =  array('id_course', 'name');
	protected $hidden = ['created_at','updated_at'];



	public function __toString()
    {
        if ($this == NULL) {
            return "";
        } else {
	    	return $this->name;
        }
    }
}
