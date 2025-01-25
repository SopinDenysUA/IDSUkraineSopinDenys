<?php

namespace App\Http\Controllers;

use App\Services\WaitlistService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WaitlistEmbedController extends Controller
{
    protected WaitlistService $_waitlistService;

    public function __construct(WaitlistService $_waitlistService)
    {
        $this->_waitlistService = $_waitlistService;
    }

    /**
     * @param $uuid
     * @return ResponseFactory|Application|Response
     */
    public function embed($uuid): Application|Response|ResponseFactory
    {
        $waitlist = $this->_waitlistService->getWaitlist($uuid);

        $script = "
            (function() {
                var container = document.getElementById('waitlist-container-{$waitlist->uuid}');
                if (container) {
                    container.innerHTML = `
                        <form action='/waitlist/submit' method='POST' style='text-align: center;'>
                            <h3>{$waitlist->name}</h3>
                            <button type='submit' style='background-color: {$waitlist->submit_color};'>
                                {$waitlist->submit_text}
                            </button>
                        </form>
                        <p>{$waitlist->success_message}</p>
                    `;
                }
            })();
        ";

        return response($script)->header('Content-Type', 'application/javascript');
    }
}
