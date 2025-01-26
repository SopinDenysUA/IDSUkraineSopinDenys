<?php

namespace App\Http\Controllers\Waitlist;

use App\Http\Controllers\Controller;
use App\Models\Waitlist;
use Illuminate\Http\Request;

class WaitlistPublicController extends Controller
{
    public function show($link)
    {
        $waitlist = Waitlist::where('shareable_link', $link)
            ->where('is_shareable', true)
            ->with('subscribers')
            ->firstOrFail();

        return view('waitlists.public', compact('waitlist'));
    }
}
