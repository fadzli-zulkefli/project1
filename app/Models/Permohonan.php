<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Permohonan
 * @package App\Models
 * @version April 1, 2020, 3:19 am UTC
 *
 * @property string no_ic
 * @property string name
 * @property integer kategori
 * @property string email
 * @property string no_tel
 * @property string no_akaun
 * @property string nama_bank
 * tarikh_permohonan
 */
class Permohonan extends Model
{

    public $table = 'permohonan';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'no_ic',
        'name',
        'kategori',
        'email',
        'no_tel',
        'no_akaun',
        'nama_bank',
        'tarikh_permohonan',
        'tarikh_hantar',
        'status',
        'jumlah_diluluskan',
        'negeri',
        'kuiri_fields',
        'komen', 'note', 'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_ic' => 'string',
        'name' => 'string',
        'kategori' => 'integer',
        'email' => 'string',
        'no_tel' => 'string',
        'no_akaun' => 'string',
        'nama_bank' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_ic' => 'required',
        'name' => 'required',
        // 'kategori' => 'required'
    ];

    public static $update_rules = [
        //'status' => 'required',
        //'name' => 'required',
        // 'kategori' => 'required'
    ];
}
