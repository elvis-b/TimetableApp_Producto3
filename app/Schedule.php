<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	protected $table ='schedule';
	protected $primaryKey = 'id_schedule';
	protected $fillable =  array('id_schedule', 'day', 'time_end', 'time_start');
	protected $hidden = ['created_at','updated_at'];


	public function __toString()
    {
        if ($this == NULL) {
            return "";
        } else {
	    	return $this->day . " (" . $this->time_start . " - " . $this->time_end . ")";
        }
    }
}
