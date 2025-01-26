<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\Waitlist;
use Livewire\Component;

class WaitlistAdmin extends Component
{
    public $waitlists;
    public $selectedWaitlist;
    public $subscribers = [];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->waitlists = Waitlist::withCount('subscribers')->get();
    }

    /**
     * @param $waitlistId
     * @return void
     */
    public function selectWaitlist($waitlistId): void
    {
        $this->selectedWaitlist = Waitlist::with('subscribers')->find($waitlistId);

        $this->subscribers = $this->selectedWaitlist->subscribers;
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view('livewire.waitlist-admin');
    }
}
