@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="text-center text-3xl font-bold text-gray-800">Welcome Back</h2>
    <p class="mt-2 text-center text-sm text-gray-600">
      Sign in to your account
    </p>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form class="space-y-6" method="POST" action="{{ route('login') }}">
        @csrf
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

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
              Remember me
            </label>
          </div>

          <div class="text-sm">
            <a href="{{ route('password.request') }}" class="font-medium text-blue-500 hover:text-blue-500">
              Forgot your password?
            </a>
          </div>
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Sign in
          </button>
        </div>
      </form>

      <div class="mt-6">
        <p class="text-center text-sm text-gray-600">
          Don't have an account?
          <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-blue-500">
            Sign up
          </a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
