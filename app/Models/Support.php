<?php

namespace App\Models;

use App\Services\Enums\SupportStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Support extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'supports';
    protected $with = ['replies', 'user'];
    protected $fillable = [
        'subject',
        'content_body',
        'status'
    ];

    /**
     * @return Attribute
     */
    public function status(): Attribute {
        return Attribute::make(
            set: fn(SupportStatus $status) => $status->name,
        );
    }

    /**
     * @return Attribute
     */
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
     * @return HasMany
     */
    public function replies():HasMany {
        return $this->hasMany(ReplySupport::class);
    }
}
