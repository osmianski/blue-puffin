<?php

namespace App\Observers;

use App\Models\Node;
use App\Models\Page;
use App\Models\Slug;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user): void
    {
        if ($user->slug === null) {
            $user->slug = $user->data['name'] ? Str::slug($user->data['name']) : null;
        }
    }

    public function created(User $user): void
    {
        if ($user->slug !== null) {
            $user->slug()->create([
                'type' => Slug\Type::User,
                'slug' => $user->slug,
            ]);
        }

        $database = Node::create([
            'type' => Node\Type::Database,
            'owner_id' => $user->id,
        ]);

        Page::create([
            'owner_id' => $user->id,
            'database_id' => $database->id,
        ]);
    }
}
