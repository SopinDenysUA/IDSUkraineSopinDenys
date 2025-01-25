<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];
}
