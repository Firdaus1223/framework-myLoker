
@extends('layouts.global')

@section('title')
Register - myLoker
@endsection

@section('content')
<form action="{{ route('register.action') }}" method="post" class="w-full flex flex-col items-start">

    <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
    @csrf
    <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');"></div>

    <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-7 sm:h-8" src="{{ asset('assets/images/myLoker.png') }}" alt="">
        </div>

        <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
            Welcome back!
        </p>

        <div class="mt-4">
            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" >Github Name</label>
            <input type="text" name="name" placeholder="Name" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"  />
        </div>

        <div class="mt-4">
            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" >Username</label>
            <input type="text" name="username" placeholder="Username" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"  />
        </div>

        <div class="mt-4">
            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" >Password</label>
            <input type="password" name="password" placeholder="Password" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"  />
        </div>

        <div class="mt-4">
            <div class="flex justify-between">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Confirm Password</label>
            </div>

            <input type="password" name="confirm_password" placeholder="Confirm Password" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"  />
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                Sign Up
            </button>
        </div>

        <div class="flex items-center justify-between mt-4">
            <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

            <a href="{{ route('login') }}" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">Already have an account?</a>

            <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

        </div>
        @if (session('error'))
        <div class="w-full relative mb-6">
            <div class="p-2 rounded-sm bg-red-100 ring-1 ring-red-500">
                <p class="text-red-500">
                    {{ session('error') }}
                </p>
        </div>
    </div>
    @endif
    @if(session('success'))
    <div class="w-full relative mb-6">
        <div class="p-2 rounded-sm bg-green-100 ring-1 ring-green-500">
            <p class="text-green-500">
                {{ session('success') }}
            </p>
        </div>
    </div>
    @endif
    </div>
    </div>
</form>
@endsection
