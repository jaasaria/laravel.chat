<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class tblNoti extends Model
{

	protected  $table = 'notifications';
    // protected  $fillable = ['type','notifiable_id','notifiable_type','data','read_at'];

    public $incrementing = false;
    protected $guarded = [];


    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];

 	public function user()
    {
        return $this->belongsTo(User::class,'notifiable_id');
    }


    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }

    /**
     * Determine if a notification has been read.
     *
     * @return bool
     */
    public function read()
    {
        return $this->read_at !== null;
    }

    /**
     * Determine if a notification has not been read.
     *
     * @return bool
     */
    public function unread()
    {
        return $this->read_at === null;
    }

}
