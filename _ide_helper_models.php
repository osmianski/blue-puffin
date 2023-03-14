<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Node
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $slug
 * @property int|null $page_id
 * @property mixed|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Node newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Node newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Node query()
 * @method static \Illuminate\Database\Eloquent\Builder|Node whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Node whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Node whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Node wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Node whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Node whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Node whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperNode {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $slug
 * @property int $owner_id
 * @property mixed|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $database_id
 * @method static \Database\Factories\PageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDatabaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPage {}
}

namespace App\Models{
/**
 * App\Models\Slug
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $slug
 * @property int|null $page_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SlugFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Slug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperSlug {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $type
 * @property \App\Models\Slug|null $slug
 * @property string|null $email
 * @property \Illuminate\Database\Eloquent\Casts\AsArrayObject|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

