<?php

namespace App\Models;

use App\Services\Enums\SupportStatus;
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

    protected $fillable = [
        'subject',
        'content_body',
        'status'
    ];

    public function status(): Attribute {
        return Attribute::make(
            set: fn(SupportStatus $status) => $status->name,
        );
    }

    public function getUserOwnerSupport():BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function getReplies():HasMany {
        return $this->hasMany(ReplySupport::class);
    }
}
