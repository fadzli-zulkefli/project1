<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class KategoriPermohonan
 * @package App\Models
 * @version April 1, 2020, 3:17 am UTC
 *
 * @property string name
 */
class KategoriPermohonan extends Model
{

    public $table = 'kategori_permohonan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
