<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'mediable_type',
        'mediable_id',
        'name',
        'category',
        'description',
        'file_name',
        'doc_type',
        'mime_type',
        'size',
        'sort_order',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
