<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefSupplier extends Model
{
    
    protected  $table = 'tbl_supplier';
    protected  $fillable = ['name',
		    'address',
			'telno',
			'mobileno',
			'faxno',
			'website',
			'email',
			'notes',
			'active'
    ];

}
	