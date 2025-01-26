@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="flex justify-between items-center mb-6">
            <form action="{{ route('waitlists.update', $waitlist->id) }}" method="POST" class="max-w-md mx-auto my-10">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Назва Waitlist’а</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $waitlist->name ?? '') }}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-5">
                    <label for="submit_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Текст кнопки submit</label>
                    <input type="text" id="submit_text" name="submit_text" value="{{ old('submit_text', $waitlist->submit_text ?? '') }}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('submit_text') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-5">
                    <label for="submit_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Колір кнопки submit</label>
                    <input type="color" id="submit_color" name="submit_color" value="{{ old('submit_color', $waitlist->submit_color ?? '') }}" class="form-control p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700">
                    @error('submit_color') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-5">
                    <label for="success_message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Повідомлення після відправлення форми</label>
                    <textarea id="success_message" name="success_message" rows="4" class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('success_message', $waitlist->success_message ?? '') }}</textarea>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Зберегти</button>
            </form>
        </div>
        @if (session()->has('success'))
            <div class="max-w-md mx-auto my-10">
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif
    </div>
@endsection
