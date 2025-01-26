@extends('layouts.waitlist')

@section('content')
    <div class="container mx-auto p-4 p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <h1 class="text-2xl font-bold mb-6">Підписники на {{ $waitlist->name }}</h1>
        <table class="min-w-full bg">
            <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-950">
                <tr class="border-b border-gray-300 bg-gray-100 dark:border-gray-700 dark:bg-gray-900">
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Дата підписки</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($waitlist->subscribers as $subscriber)
                <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-950 text-center">
                    <td class="py-2 px-4 border-b">{{ $subscriber->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $subscriber->created_at->format('d.m.Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
