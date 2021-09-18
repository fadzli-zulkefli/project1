<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LogSemakan2
 * @package App\Models
 * @version November 24, 2020, 12:51 am UTC
 *
 * @property string no_ic
 * @property string ip
 */
class LogSemakan2 extends Model
{

    public $table = 'log_semakan';

    public $timestamps = false;




    public $fillable = [
        'no_ic',
        'ip',
        'created_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_ic' => 'string',
        'ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_ic' => 'required'
    ];


    public function pemohon()
    {
        // $this->hasOne('App\Phone', 'foreign_key', 'local_key');
        return $this->hasOne('App\Models\Permohonan', 'no_ic', 'no_ic');
    }


}
