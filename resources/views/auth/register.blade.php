@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="text-center text-3xl font-bold text-gray-800">Create an Account</h2>
    <p class="mt-2 text-center text-sm text-gray-600">
      Already have an account?
      <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:text-blue-500">
        Sign in
      </a>
    </p>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form class="space-y-6" method="POST" action="{{ route('register') }}">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
          <div class="mt-1">
            <input id="name" name="name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
          <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <div class="mt-1">
            <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
