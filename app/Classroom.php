<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	protected $table ='classroom';
	protected $primaryKey = 'id_classroom';
	protected $fillable =  array('id_classroom', 'id_subject', 'id_schedule', 'id_teacher', 'name');
	protected $hidden = ['created_at','updated_at'];

	private $subject = NULL;
	private $schedule = NULL;
	private $teacher = NULL;
	private $students = NULL;
}
