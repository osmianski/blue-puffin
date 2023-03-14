<?php

namespace App\Models;

use App\Models\Page\Type;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPage
 */
class Page extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => Type::class,
        'data' => AsArrayObject::class,
    ];

    public function nodes(): HasMany
    {
        return $this->hasMany(Node::class);
    }
}
