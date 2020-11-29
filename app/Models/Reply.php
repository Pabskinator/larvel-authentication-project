<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed conversation
 * @property mixed id
 */
class Reply extends Model
{
    use HasFactory;

    public function isBest() {
        return $this->id === $this->conversation->best_reply_id;
    }

    public function conversation() {
        return $this->belongsTo(Conversation::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
