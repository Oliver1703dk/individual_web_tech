@extends("app")

@section("title", "productPage")

@section("content")

    <section class="bg-amber-500">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-sky-300 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                        Profile
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('changePassword') }}">
                        @csrf
                        <div style="text-align: center;">
                            <label for="email" class="block mb-2 text-m font-bold text-white">
                                Your email:
                            </label>
                            <p style="">Email: {{ $user->email }}</p>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">
                                Old Password
                            </label>
                            <input type="password" name="passwordOld" id="passwordOld" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">
                                New Password
                            </label>
                            <input type="password" name="passwordNew1" id="passwordNew1" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">
                                Confirm Password
                            </label>
                            <input type="password" name="passwordNew2" id="passwordNew2" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <button type="submit" class="text-white bg-amber-500 font-medium rounded-3xl  hover:bg-amber-300 text-5xl font-KronaOne w-96 h-14">
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
