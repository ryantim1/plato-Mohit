<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
class institution extends Model
{
    protected $fillable=['institution_name'];

    public function users(){

    	return $this->hasMany(User::class,'inst_id')->select(['name', 'email',  'image','role_id','login_enabled','slug', 'updated_at','department','inst_name']);
    }
}
