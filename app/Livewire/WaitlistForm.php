<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\Waitlist;

class WaitlistForm extends Component
{
    public $name;
    public $submit_text;
    public $submit_color;
    public $success_message;

    /*protected $rules = [
        'name' => 'required|string|max:255',
        'submit_text' => 'required|string|max:255',
        'submit_color' => 'required|string',
        'success_message' => 'nullable|string',
    ];*/

    public function save()
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

        Waitlist::create([
            'name' => $this->name,
            'submit_text' => $this->submit_text,
            'submit_color' => $this->submit_color,
            'success_message' => $this->success_message,
        ]);

        session()->flash('success', "Waitlist {$this->name} створено успішно!");
        $this->reset();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.waitlist-form');
    }
}
