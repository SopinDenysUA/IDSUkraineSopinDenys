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

    /**
     * @return mixed
     */
    public function getCountSubscribers(): mixed
    {
        return Waitlist::withCount('subscribers')->get();
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteWaitlist($id): void
    {
        $id->delete();
    }
}
