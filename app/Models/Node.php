<?php

namespace App\Models;

use App\Models\Node\Type;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperNode
 */
class Node extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => Type::class,
        'data' => AsArrayObject::class,
    ];
}
