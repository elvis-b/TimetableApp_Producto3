<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table ='profile';
  	protected $primaryKey = 'id_profile_user';
  	protected $fillable =  array('id_profile_user', 'id_profile', 'id_user');
  	protected $hidden = ['created_at','updated_at'];
}
