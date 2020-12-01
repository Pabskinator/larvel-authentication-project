<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Conversation
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property int|null $best_reply_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Reply[] $replies
 * @property-read int|null $replies_count
 * @property-read User $user
 * @method static Builder|Conversation newModelQuery()
 * @method static Builder|Conversation newQuery()
 * @method static Builder|Conversation query()
 * @method static Builder|Conversation whereBestReplyId($value)
 * @method static Builder|Conversation whereBody($value)
 * @method static Builder|Conversation whereCreatedAt($value)
 * @method static Builder|Conversation whereId($value)
 * @method static Builder|Conversation whereTitle($value)
 * @method static Builder|Conversation whereUpdatedAt($value)
 * @method static Builder|Conversation whereUserId($value)
 * @mixin Eloquent
 */
class Conversation extends Model
{
    use HasFactory;

    public function setBestReply(Reply $reply) {
        $this->best_reply_id = $reply->id;
        $this->save();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }
}
