<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'access',
        'group_id',
        'name',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function group()
    {
        return $this->belongsTo(Permission::class, 'group_id');
    }
}
