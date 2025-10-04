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
    <div class="flex space-x-[1.5rem]">
        <aside class="w-full max-w-[250px] text-white h-screen px-[1.5rem] py-[2rem] bg-[#AD49E1]">
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
                    class=" p-[0.5rem] rounded-md font-semibold cursor-pointer {{ request()->is('books') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books" class="block">All Books</a>
                </li>
                <li
                    class="p-[0.5rem] rounded-md font-semibold cursor-pointer {{ request()->is('books/read') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books/read" class="block">Books Read</a>
                </li>
                <li
                    class="p-[0.5rem] rounded-md font-semibold cursor-pointer {{ request()->is('books/reading') ? 'bg-[#7A1CAC]' : '' }}">
                    <a href="/books/reading" class="block">Books Reading</a>
                </li>
            </ul>

        </aside>

        <main class="w-full p-[2rem]">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
