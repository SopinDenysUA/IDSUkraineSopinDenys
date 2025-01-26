<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\WaitlistService;
use App\Models\Waitlist;

class WaitlistController extends Controller
{
    protected WaitlistService $_waitlistService;

    public function __construct(WaitlistService $_waitlistService)
    {
        $this->_waitlistService = $_waitlistService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $waitlists = $this->_waitlistService->getCountSubscribers();

        return view('waitlists.index', compact('waitlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Waitlist $waitlist
     * @return View
     */
    public function show(Waitlist $waitlist): View
    {
        $subscribers = $waitlist->subscribers;

        return view('waitlists.show', compact('waitlist', 'subscribers'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * @param Waitlist $waitlist
     * @return RedirectResponse
     */
    public function destroy(Waitlist $waitlist): RedirectResponse
    {
        $this->_waitlistService->deleteWaitlist($waitlist);

        return redirect()->route('waitlists.index')->with('success', "Waitlist {$waitlist->name} успішно видалено");
    }
}
