<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
	protected $table ='course_subject';
	protected $primaryKey = 'id_course_subject';
	protected $fillable =  array('id_course_subject', 'id_course', 'id_subject');
	protected $hidden = ['created_at','updated_at'];
}
