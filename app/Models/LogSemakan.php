<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LogSemakan
 * @package App\Models
 * @version April 1, 2020, 6:14 am UTC
 *
 *
 */
class LogSemakan extends Model
{

    public $table = 'log_semakan';

    public $timestamps = false;




    public $fillable = [
        'no_ic',
        'created_at',
        'ip',

    ];
}
