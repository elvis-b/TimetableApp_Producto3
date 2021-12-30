<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	protected $table ='subject';
	protected $primaryKey = 'id_subject';
	protected $fillable =  array('id_subject', 'name', 'percentage_exam', 'percentage_work', 'date_start', 'date_end');
	protected $hidden = ['created_at','updated_at'];

	private $students = NULL;

	public function __toString()
    {
        if ($this == NULL) {
            return "";
        } else {
	    	return $this->name;
        }
    }
}
