<?php

namespace App\Models;

use Eloquent as Model;


class StatusList extends Model
{

    public $table = 'status_list';

    public $timestamps = false;




    public $fillable = [
        'name','value'
        

    ];
}
