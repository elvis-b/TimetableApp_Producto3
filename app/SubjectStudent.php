<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectStudent extends Model
{
	protected $table ='subject_student';
	protected $primaryKey = 'id_subject_student';
	protected $fillable =  array('id_subject_student', 'id_subject', 'id_student', 'note_exam', 'note_work', 'note_final');
	protected $hidden = ['created_at','updated_at'];


	private $subject = NULL;
	private $student = NULL;
	private $works = NULL;
	private $exams = NULL;
}
