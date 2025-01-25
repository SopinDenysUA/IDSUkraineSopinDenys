<div>
    <form class="max-w-md mx-auto my-10" wire:submit.prevent="save">
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Назва Waitlist’а</label>
            <input type="text" id="name" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="submit_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Текст кнопки submit</label>
            <input type="text" id="submit_text" wire:model="submit_text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('submit_text') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="submit_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Колір кнопки submit</label>
            <input type="color" id="submit_color" value="" wire:model="submit_color" class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700">
            @error('submit_color') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="success_message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Повідомлення після відправлення форми</label>
            <textarea id="success_message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="success_message"></textarea>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Зберегти</button>
    </form>
    @if (session()->has('success'))
        <div class="max-w-md mx-auto my-10">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
        @if (!empty($embedCode))
            <div class="max-w-xl mx-auto my-10">
                <div class="my-10">
                    <label for="script_tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Script Tag:</label>
                    <textarea id="script_tag" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>{{ $embedCode['script_tag'] }}</textarea>
                </div>
                <div class="my-10">
                    <label for="html_container" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">HTML Container:</label>
                    <textarea id="html_container" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>{{ $embedCode['html_container'] }}</textarea>
                </div>
            </div>
        @endif
    @endif
</div>
