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

    public function getUserOwnerSupport():BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function getSupport():BelongsTo {
        return $this->BelongsTo(Support::class);
    }
}
