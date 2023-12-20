<!DOCTYPE html>

<html lang="en">
<head>
    <title>Register user</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url(https://ibb.co/n67NGzH)] bg-cover min-h-screen">
<div class="w-96 h-full">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="w-96 h-full left-[500px] top-[80px] absolute">
        <div class="w-[30rem] h-[43rem] left-0 top-0 absolute bg-blue-300 rounded-2xl shadow"></div>

        <form method="POST" action={{route('userRegPost')}}>
            @csrf

            <label
                class="block mb-1.5 ml-6 mt-4 text-4xl font-['Krona One'] font-medium text-white dark:text-white scale-95">E-mail</label>
            <div class="relative mb-6  ml-8 w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pt-1 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <path
                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                    </svg>
                </div>
                <input type="email" name="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="example@email.com">
            </div>
            <label
                class="block mb-1.5 ml-6 text-4xl font-['Krona One'] font-medium text-white dark:text-white scale-95">Password</label>
            <div class="relative mb-6 ml-8  w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                    </svg>
                </div>
                <input type="password" name="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="********">
            </div>

            <label
                class="block mb-1.5 ml-6 mt-4 text-4xl font-['Krona One'] font-medium text-white dark:text-white scale-95">Repeat
                Password</label>
            <div class="relative mb-6  ml-8 w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                    </svg>
                </div>
                <input type="password" name="rpassword"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="********">
            </div>

            <label
                class="block mb-1.5 ml-6 mt-4 text-4xl font-['Krona One'] font-medium text-white dark:text-white scale-95">Phone
                Number</label>
            <div class="relative mb-6  ml-8 w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                    </svg>
                </div>
                <input type="number" name="phone"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Phone Number">
                <div class="py-4 flex content-center">
                    <button type="submit"
                            class="text-white bg-amber-500 font-medium rounded-3xl  hover:bg-amber-300 text-5xl font-KronaOne w-96 h-14">
                        Create Account
                    </button>
                </div>
            </div>
        </form>
    </div>


</div>

</body>

</html>


