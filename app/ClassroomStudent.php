<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
	protected $table ='classroom_student';
	protected $primaryKey = 'id_classroom_student';
	protected $fillable =  array('id_classroom_student', 'id_classroom', 'id_student');
	protected $hidden = ['created_at','updated_at'];
}
