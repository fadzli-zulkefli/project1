<?php

namespace App\Repositories;

use App\Models\LogSemakan2;
use App\Repositories\BaseRepository;

/**
 * Class LogSemakan2Repository
 * @package App\Repositories
 * @version November 24, 2020, 12:51 am UTC
*/

class LogSemakan2Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_ic',
        'ip'
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
        return LogSemakan2::class;
    }
}
