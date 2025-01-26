<div class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 max-w-md mx-auto px-4 my-5">
    <h2 class="text-lg font-semibold mb-4">Список Waitlist’ів</h2>
    <table>
        <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-950">
        <tr>
            <th>Назва waitlist’а</th>
            <th>Дата створення</th>
            <th>Кількість підписників</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($waitlists as $waitlist)
            <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-950 text-center">
                <td>{{ $waitlist->name }}</td>
                <td>{{ $waitlist->created_at }}</td>
                <td>{{ $waitlist->subscribers_count }}</td>
                <td><button wire:click="selectWaitlist({{ $waitlist->id }})" class="px-4 py-2 bg-blue-500 text-white rounded-ms">Деталі</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if ($selectedWaitlist)
        <livewire:waitlist-admin />
        <div class="mt-6">
            <h3 class="text-lg font-semibold">Деталі Waitlist’а: {{ $selectedWaitlist->name }}</h3>
            <p>Дата створення: {{ $selectedWaitlist->created_at->format('d.m.Y') }}</p>
            <h4 class="mt-4 text-md font-semibold">Список підписників:</h4>
            <table class="table-auto w-full mt-2">
                <thead>
                <tr>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Дата підписки</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($subscribers as $subscriber)
                    <tr>
                        <td class="border px-4 py-2">{{ $subscriber->email }}</td>
                        <td class="border px-4 py-2">{{ $subscriber->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="border px-4 py-2 text-center">Підписники відсутні</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    @endif
</div>

