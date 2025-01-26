<?php

namespace App\Services;

use App\Models\Waitlist;

class WaitlistService
{
    /**
     * @return mixed
     */
    public function getAllWaitlist(): mixed
    {
        return Waitlist::where('user_id', auth()->id())->withCount('subscribers')->get();
    }
    /**
     * @param $uuid
     * @return mixed
     */
    public function getWaitlist($uuid): mixed
    {
        return Waitlist::where('uuid', $uuid)->firstOrFail();
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
