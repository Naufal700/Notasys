@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-md rounded-lg px-8 py-6">
    <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100 text-center">Reset Password</h2>

    @if(session('status'))
        <div class="mb-4 text-green-600 dark:text-green-400 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-medium mb-1" for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus
                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition-colors">
            Send Password Reset Link
        </button>
    </form>
</div>
@endsection
