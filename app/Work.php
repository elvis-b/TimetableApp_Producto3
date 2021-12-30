<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
	protected $table ='work';
  	protected $primaryKey = 'id_work';
  	protected $fillable =  array('id_work', 'id_subject', 'id_student', 'name', 'note');
  	protected $hidden = ['created_at','updated_at'];

  	private $subject = NULL;
}
