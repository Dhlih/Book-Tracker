<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex space-x-[1.5rem] ">
        <aside
            class="w-full hidden fixed bottom-0 left-0 top-0 md:flex flex-col justify-between max-w-[250px] text-white min-h-screen px-[1.5rem] py-[2rem] bg-[#AD49E1]">
            <div class="flex items-center space-x-[0.8rem] mb-[1.5rem]">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                        clip-rule="evenodd" />
                </svg>

                <h2 class="font-bold text-xl text-center ">Reading Tracker</h2>
            </div>

            <ul class="flex flex-col space-y-[1.5rem]">
                <li
                    class=" p-[0.5rem] rounded-md font-semibold cursor-pointer hover:bg-[#7A1CAC] {{ request()->is('books/index') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books/index" class="block">All</a>
                </li>
                <li
                    class="p-[0.5rem] rounded-md font-semibold cursor-pointer hover:bg-[#7A1CAC] {{ request()->is('books/finished') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books/finished" class="block">Finished</a>
                </li>
                <li
                    class="p-[0.5rem] rounded-md font-semibold cursor-pointer hover:bg-[#7A1CAC] {{ request()->is('books/reading') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books/reading" class="block">Reading</a>
                </li>
                <li
                    class=" p-[0.5rem] rounded-md font-semibold cursor-pointer hover:bg-[#7A1CAC] {{ request()->is('books/add') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books/add" class="block">Add Book</a>
                </li>
            </ul>
            <form action="/logout" class="mt-auto" method="POST">
                @csrf
                <button
                    class="w-full rounded-md p-[0.5rem] font-semibold  bg-[#2E073F] cursor-pointer hover:bg-[#2E073F]/70"
                    type="submit">
                    Logout
                </button>
            </form>
        </aside>

        {{-- mobile navbar --}}
        <nav class="w-full md:hidden fixed bottom-0 left-0 right-0 px-[2rem] py-[0.5rem] bg-[#AD49E1] text-white">
            <ul class="flex justify-between items-center space-x-[2rem]">
                <!-- ALL -->
                <li>
                    <a href="/books/index"
                        class="flex flex-col space-y-[0.2rem] justify-center items-center rounded-md font-semibold cursor-pointer 
                {{ request()->is('books/index') ? 'bg-[#7A1CAC] px-[0.5rem]' : '' }}">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                        </svg>
                        <span class="block text-center">All</span>
                    </a>
                </li>

                <!-- FINISHED -->
                <li>
                    <a href="/books/finished"
                        class="flex flex-col space-y-[0.2rem] justify-center items-center rounded-md font-semibold cursor-pointer 
                {{ request()->is('books/finished') ? 'bg-[#7A1CAC] px-[0.5rem]' : '' }}">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007
                        3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0
                        .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023" />
                        </svg>
                        <span class="block text-center">Finished</span>
                    </a>
                </li>

                <!-- READING -->
                <li>
                    <a href="/books/reading"
                        class="flex flex-col space-y-[0.2rem] justify-center items-center rounded-md font-semibold cursor-pointer 
                {{ request()->is('books/reading') ? 'bg-[#7A1CAC] px-[0.5rem]' : '' }}">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.111 20A3.111 3.111 0 0 1 4 16.889v-12C4 4.398 4.398 4 4.889 4h4.444a.89.89 0 0 1 .89.889v12A3.111
                        3.111 0 0 1 7.11 20Zm0 0h12a.889.889 0 0 0 .889-.889v-4.444a.889.889 0 0 0-.889-.89h-4.389a.889.889
                        0 0 0-.62.253l-3.767 3.665a.933.933 0 0 0-.146.185c-.868 1.433-1.581 1.858-3.078 2.12Zm0-3.556h.009m7.933-10.927
                        3.143 3.143a.889.889 0 0 1 0 1.257l-7.974 7.974v-8.8l3.574-3.574a.889.889 0 0 1 1.257 0Z" />
                        </svg>
                        <span class="block text-center">Reading</span>
                    </a>
                </li>

                <!-- ADD -->
                <li>
                    <a href="/books/add"
                        class="flex flex-col space-y-[0.2rem] justify-center items-center rounded-md font-semibold cursor-pointer 
                {{ request()->is('books/add') ? 'bg-[#7A1CAC] px-[0.5rem]' : '' }}">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v12m6-6H6" />
                        </svg>
                        <span class="block text-center">Add</span>
                    </a>
                </li>
            </ul>
        </nav>

        <main class="w-full md:ml-[18rem] p-[2rem] pb-[8rem]">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
