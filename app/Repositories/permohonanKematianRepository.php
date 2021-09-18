<?php

namespace App\Repositories;

use App\Models\permohonanKematian;
use App\Repositories\BaseRepository;

/**
 * Class permohonanKematianRepository
 * @package App\Repositories
 * @version June 13, 2021, 2:31 am UTC
*/

class permohonanKematianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patient_name',
        'patient_nokp',
        'beneficiary_name',
        'status_code',
        'created_userid',
        'created_date',
        'updated_userid',
        'updated_date'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return permohonanKematian::class;
    }
}
