<?php

namespace App\Models;

use Eloquent as Model;


class PermohonanUpload extends Model
{

    public $table = 'permohonan_upload';

    public $timestamps = false;




    public $fillable = [
        'permohonan_id',
        'jenis_upload_id',
        'file_path',
        'created_at'

    ];
}
