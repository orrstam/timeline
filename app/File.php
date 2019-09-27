<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_name',
        'mime_type',
        'extension',
        'path',
        'size',
        'caption'
    ];

    //
}
