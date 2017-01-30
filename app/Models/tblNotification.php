<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblNotification extends Model
{

	protected  $table = 'tbl_notifications';
    protected  $fillable = ['title','description','avatar','stat','slug'];

}


