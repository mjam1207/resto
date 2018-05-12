<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tblmenucategory;

class Tblmenu extends Model
{
    protected $primaryKey = 'menuId';
    public $incrementing = false;

    protected $table = 'tblmenu';
    
     public function Tblmenu()
    {
    	return $this->belongsTo('App\Tblmenucategory');
    }

    
}
