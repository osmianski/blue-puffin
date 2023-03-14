<?php

namespace App\Observers;

use App\Models\Slug;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user): void
    {
        if (!$user->slug) {
            $user->slug = $user->data['name'] ? Str::slug($user->data['name']) : null;
        }
    }

    public function created(User $user): void
    {
        if ($user->slug) {
            $user->slug()->create([
                'type' => Slug\Type::User,
                'slug' => $user->slug,
            ]);
        }
    }
}
