@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Waitlist: {{ $waitlist->name }}</h1>
            @if (session('success'))
                <div class="p-1 mb-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex gap-4">
                <form action="{{ route('waitlists.toggle-access', $waitlist->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button
                        type="submit"
                        class="{{ $waitlist->is_shareable ? 'bg-gray-500' : 'bg-green-500' }} hover:bg-opacity-75 text-white font-bold py-2 px-4 rounded">
                        {{ $waitlist->is_shareable ? 'Відключити доступ' : 'Включити доступ' }}
                    </button>
                </form>
                <button onclick="copyToClipboard('{{ route('waitlist.public', $waitlist->shareable_link) }}')" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Поділитися
                </button>
                <a href="{{ route('waitlists.index') }}" class="bg-grey-800 hover:bg-grey-900 text-white font-bold py-2 px-4 rounded">Повернутися до списку</a>
            </div>
        </div>
        <p class="mb-4"><strong>Створенний:</strong> {{ $waitlist->created_at->format('Y-m-d') }}</p>
        <h2 class="text-lg font-bold mb-2">Підписники</h2>
        <table class="min-w-full bg">
            <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-950">
            <tr>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Дата підписки</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subscribers as $subscriber)
                <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-950 text-center">
                    <td class="py-2 px-4 border-b">{{ $subscriber->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $subscriber->created_at->format('d.m.Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
