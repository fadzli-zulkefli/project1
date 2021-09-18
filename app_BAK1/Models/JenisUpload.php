<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class JenisUpload
 * @package App\Models
 * @version April 1, 2020, 6:14 am UTC
 *
 * @property string name
 * @property string template_file
 * @property integer kategori_1
 * @property integer kategori_1_wajib
 * @property integer kategori_2
 * @property integer kategori_2_wajib
 * @property integer item_order
 */
class JenisUpload extends Model
{

    public $table = 'jenis_upload';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'template_file',
        'kategori_1',
        'kategori_1_wajib',
        'kategori_2',
        'kategori_2_wajib',
        'item_order'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'template_file' => 'string',
        'kategori_1' => 'integer',
        'kategori_1_wajib' => 'integer',
        'kategori_2' => 'integer',
        'kategori_2_wajib' => 'integer',
        'item_order' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'kategori_1' => 'required',
        'kategori_1_wajib' => 'required',
        'kategori_2' => 'required',
        'kategori_2_wajib' => 'required',
        'item_order' => 'required'
    ];

    
}
