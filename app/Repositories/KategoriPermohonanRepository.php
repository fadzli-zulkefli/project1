<?php

namespace App\Repositories;

use App\Models\KategoriPermohonan;
use App\Repositories\BaseRepository;

/**
 * Class KategoriPermohonanRepository
 * @package App\Repositories
 * @version April 1, 2020, 3:17 am UTC
*/

class KategoriPermohonanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return KategoriPermohonan::class;
    }
}
