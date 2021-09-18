<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class permohonanKematian
 * @package App\Models
 * @version June 13, 2021, 2:31 am UTC
 *
 * @property string patient_name
 * @property string patient_nokp
 * @property string beneficiary_name
 * @property string status_code
 * @property string created_userid
 * @property string created_date
 * @property string updated_userid
 * @property string updated_date
 * @property string received_date
 */
class permohonanKematian extends Model
{

    public $table = 'permohonan_kematians';
    
    public $timestamps = false;




    public $fillable = [
        'patient_name',
        'patient_nokp',
        'beneficiary_name',
        'status_code',
        'created_userid',
        'created_date',
        'updated_userid',
        'updated_date',
        'received_date',
        'application_date',
        'post_method',
        'hospital_name',
        'beneficiary_phone',
        'email',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_name' => 'string',
        'patient_nokp' => 'string',
        'beneficiary_name' => 'string',
        'status_code' => 'string',
        'created_userid' => 'string',
        'updated_userid' => 'string',
        'application_date' => 'string',
        'post_method' => 'string',
        'hospital_name' => 'string',
        'beneficiary_phone' => 'string',
        'email' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_name' => 'required',
        'patient_nokp' => 'required',
        'beneficiary_name' => 'required',
        'application_date' => 'required',
        'post_method' => 'required',
        'hospital_name' => 'required',
        'beneficiary_phone' => 'required',
        'email' => 'required',
    ];

    
}
