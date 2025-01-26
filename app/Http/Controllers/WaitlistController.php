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
        $waitlists = $this->_waitlistService->getAllWaitlist();

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

    /**
     * @param Waitlist $waitlist
     * @return View
     */
    public function edit(Waitlist $waitlist): View
    {
        return view('waitlists.edit', compact('waitlist'));
    }

    /**
     * @param Request $request
     * @param Waitlist $waitlist
     * @return RedirectResponse
     */
    public function update(Request $request, Waitlist $waitlist): RedirectResponse
    {
        $request->validate(
            [
            'name' => 'required|string|max:255',
            'submit_text' => 'required|string|max:255',
            'submit_color' => 'required|string',
            'success_message' => 'nullable|string',
            ],
            [
                'name.required' => 'Поле "Назва Waitlist’а" обов`язкове для заповнення',
                'submit_text.required' => 'Поле "Текст кнопки submit" обов`язкове для заповнення',
                'submit_color.required' => 'Виберіть колір в полі "Колір кнопки submit"',
            ]
        );

        $this->_waitlistService->updateWaitlist($request, $waitlist);

        return redirect()->back()->with('success', "Waitlist {$request->name} успішно оновлено");
    }

    /**
     * @param Waitlist $waitlist
     * @return RedirectResponse
     */
    public function destroy(Waitlist $waitlist): RedirectResponse
    {
        $this->_waitlistService->deleteWaitlist($waitlist);

        return redirect()->back()->with('success', "Waitlist {$waitlist->name} успішно видалено");
    }

    /**
     * @param Waitlist $waitlist
     * @return RedirectResponse
     */
    public function toggleAccess(Waitlist $waitlist): RedirectResponse
    {
        $waitlist->is_shareable = !$waitlist->is_shareable;
        $waitlist->save();

        return redirect()->back()->with('success', "Доступ до waitlist {$waitlist->name} успішно змінено");
    }
}
