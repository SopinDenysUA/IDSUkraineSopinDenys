<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscriber extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'waitlist_id'
    ];

    /**
     * @return BelongsTo
     */
    public function waitlist(): BelongsTo
    {
        return $this->belongsTo(Waitlist::class);
    }
}
