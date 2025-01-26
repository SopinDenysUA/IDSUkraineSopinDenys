<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Waitlist extends Model
{
    use HasFactory;
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'user_id',
        'submit_text',
        'submit_color',
        'success_message',
        'script_tag',
        'html_container',
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
