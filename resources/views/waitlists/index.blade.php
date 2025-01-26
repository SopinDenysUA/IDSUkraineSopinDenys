@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Список Waitlist’ів</h1>
            @if (session('success'))
                <div class="p-1 mb-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex gap-4">
                <a href="{{ route('waitlist.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Додати Waitlist</a>
            </div>
        </div>
        <table class="min-w-full bg">
            <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-950">
                <tr>
                    <th class="py-2 px-4 border-b">Назва waitlist’а</th>
                    <th class="py-2 px-4 border-b">Дата створення</th>
                    <th class="py-2 px-4 border-b">Кількість підписників</th>
                    <th class="py-2 px-4 border-b">Дії</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($waitlists as $waitlist)
                <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-950 text-center">
                    <td class="py-2 px-4 border-b">{{ $waitlist->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $waitlist->created_at->format('d.m.Y') }}</td>
                    <td class="py-2 px-4 border-b">{{ $waitlist->subscribers_count }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('waitlists.show', $waitlist->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-2 rounded">Переглянути</a>
                        <form action="{{ route('waitlists.toggle-access', $waitlist->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button
                                type="submit"
                                class="{{ $waitlist->is_shareable ? 'bg-gray-500' : 'bg-green-500' }} hover:bg-opacity-75 text-white font-bold py-2 px-4 rounded">
                                {{ $waitlist->is_shareable ? 'Відключити доступ' : 'Включити доступ' }}
                            </button>
                        </form>
                        <button onclick="copyToClipboard('{{ route('waitlist.public', $waitlist->shareable_link) }}')" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-2 rounded">
                            Поділитися
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
