<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Waitlist extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'submit_text',
        'submit_color',
        'success_message',
        'shareable_link',
        'is_shareable'
    ];

    /**
     * @return HasMany
     */
    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($waitlist) {
            $waitlist->uuid = Str::uuid();
        });
    }
}
