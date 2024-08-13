@extends('base-template')

@section('page_title')
    Forgot Password
@endsection

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                <h1 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Forgot your password?
                </h1>
                <p class="font-light text-gray-500 dark:text-gray-400">Don't fret! Just type in your email and we will send
                    you a code to reset your password!</p>
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@company.com" required="true">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Reset
                        password</button>
                </form>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400 mt-2">
                    <a href="{{ url()->previous() }}"
                        class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>
                </p>
            </div>
        </div>
    </section>
@endsection
