<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReplySupport extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'replies_support';
    protected $fillable = [
        'user_id',
        'support_id',
        'content'
    ];

    public function createdAt():Attribute {
        return Attribute::make(
            get: fn(string $createdAt) => Carbon::make($createdAt)->format('D, d F Y g:i A'),
        );
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function support():BelongsTo {
        return $this->BelongsTo(Support::class);
    }

    public function findRepliesSupport(string $id) {
        return self::where('support_id', $id)->get();
    }
}
