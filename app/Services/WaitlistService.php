<?php

namespace App\Services;

use App\Models\Waitlist;

class WaitlistService
{
    /**
     * @param $uuid
     * @return mixed
     */
    public function getWaitlist($uuid): mixed
    {
        return Waitlist::where('uuid', $uuid)->firstOrFail();
    }
}
