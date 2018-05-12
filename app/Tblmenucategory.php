<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tblmenu;


class Tblmenucategory extends Model
{
	protected $primaryKey = 'categoryId';
    protected $table = 'tblmenucategory';
    public $incrementing = false;

	public function tblmenu()
	{
		return $this->hasMany('App\Tblmenu');
	}

}
