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

    public function updateWaitlist($data, $waitlist)
    {
        return $waitlist->update([
            'name' => $data['name'],
            'submit_text' => $data['submit_text'],
            'submit_color' => $data['submit_color'],
            'success_message' => $data['success_message'],
        ]);
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
