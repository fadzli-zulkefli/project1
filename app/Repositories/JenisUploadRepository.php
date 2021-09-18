<?php

namespace App\Repositories;

use App\Models\JenisUpload;
use App\Repositories\BaseRepository;

/**
 * Class JenisUploadRepository
 * @package App\Repositories
 * @version April 1, 2020, 6:14 am UTC
*/

class JenisUploadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'template_file',
        'kategori_1',
        'kategori_1_wajib',
        'kategori_2',
        'kategori_2_wajib',
        'item_order'
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
        return JenisUpload::class;
    }
}
