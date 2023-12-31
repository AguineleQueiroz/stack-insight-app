<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use mysql_xdevapi\Table;

class ReplySupport extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'replies_support';
    protected $fillable = [
        'user_id',
        'support_id',
        'content'
    ];
    /**
     * @return BelongsTo
     */
    public function getUserOwnerSupport():BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function getSupport():BelongsTo {
        return $this->BelongsTo(Support::class);
    }

    public function findRepliesSupport(string $id) {
        return self::where('support_id', $id)->get();
    }
}
