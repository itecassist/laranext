<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'organisation_id',
        'name',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function member()
    {
        return $this->belongsToMany(Member::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
}
