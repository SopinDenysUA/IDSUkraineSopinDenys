<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\Waitlist;

class WaitlistForm extends Component
{
    public $name;
    public $submit_text;
    public $submit_color;
    public $success_message;
    public $embedCode;

    /**
     * @return void
     */
    public function save(): void
    {
        $this->validate([
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

        $waitlist = Waitlist::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
            'submit_text' => $this->submit_text,
            'submit_color' => $this->submit_color,
            'success_message' => $this->success_message,
            'shareable_link' => Str::uuid()->toString(),
            'is_shareable' => false,
        ]);

        $this->embedCode = $this->getEmbedCode($waitlist->id);

        session()->flash('success', "Waitlist {$this->name} створено успішно!");
        $this->reset(['name', 'submit_text', 'submit_color', 'success_message']);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.waitlist-form');
    }

    /**
     * @param $waitlistId
     * @return string[]
     */
    public function getEmbedCode($waitlistId): array
    {
        $waitlist = Waitlist::findOrFail($waitlistId);

        $scriptTag = '<script src="' . route('waitlist.embed', ['uuid' => $waitlist->uuid]) . '"></script>';
        $htmlContainer = '<div id="waitlist-container-' . $waitlist->uuid . '"></div>';

        $waitlist->update([
            'script_tag' => $scriptTag,
            'html_container' => $htmlContainer,
        ]);

        return [
            'script_tag' => $scriptTag,
            'html_container' => $htmlContainer,
        ];
    }
}
