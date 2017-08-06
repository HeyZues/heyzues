<?php

namespace HeyZues;

use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
	protected $table = 'employees';
   protected $fillable = array('id', 'name', 'email','contact_number','position');
}
