@extends('layouts.guest')

@section('content')
    <div class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Підписники на {{ $waitlist->name }}</h1>

        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-md">
            <thead>
            <tr class="border-b border-gray-300 bg-gray-100 dark:border-gray-700 dark:bg-gray-900">
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Дата підписки</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($waitlist->subscribers as $subscriber)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="py-4 px-6">{{ $subscriber->email }}</td>
                    <td class="py-4 px-6">{{ $subscriber->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
