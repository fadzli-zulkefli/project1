<?php

namespace App\Repositories;

use App\Models\Permohonan;
use App\Repositories\BaseRepository;

/**
 * Class PermohonanRepository
 * @package App\Repositories
 * @version April 1, 2020, 3:19 am UTC
*/

class PermohonanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_ic',
        'name',
        'kategori',
        'email',
        'no_tel',
        'no_akaun',
        'nama_bank'
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
        return Permohonan::class;
    }
}
