<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\User\Type;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'data->name',
        'email',
        'data->password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'data->password',
        'data->remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => Type::class,
        'data' => AsArrayObject::class,
    ];

    public static function getHomePageId(int $userId): int
    {
        return DB::table('pages')
            ->join('nodes', 'pages.database_id', 'nodes.id')
            ->where('nodes.owner_id', $userId)
            ->whereNull('nodes.page_id')
            ->value('pages.id');

    }

    public function slug(): HasOne
    {
        return $this->hasOne(Slug::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, foreignPivotKey: 'organization_id');
    }
}
