<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;

class tblNoti extends Model
{

	protected  $table = 'notifications';
    protected  $fillable = ['type','notifiable_id','notifiable_type','data','read_at'];

 	public function user()
    {
        return $this->belongsTo(User::class,'notifiable_id');
    }


}


