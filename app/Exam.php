<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
	protected $table ='exam';
  	protected $primaryKey = 'id_exam';
  	protected $fillable =  array('id_exam', 'id_subject', 'id_student', 'name', 'note');
  	protected $hidden = ['created_at','updated_at'];

  	private $subject = NULL;
}
