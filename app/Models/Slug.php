<?php

namespace App\Models;

use App\Models\Slug\Type;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperSlug
 */
class Slug extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => Type::class,
        'data' => AsArrayObject::class,
    ];
}
