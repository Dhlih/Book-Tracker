<x-layout>
    <h1 class="font-bold text-3xl mb-[1.5rem] ">All Books</h1>
    <div class="flex items-center space-x-[1rem]">
        <input type="text" class="w-full max-w-[280px] bg-[#AD49E1] rounded-md p-[0.5rem] text-white outline-none"
            placeholder="Search book...">
        <button class="bg-[#EBD3F8] rounded-md py-[0.5rem] px-[0.8rem] cursor-pointer">Search</button>
    </div>
    <div class="books-container mt-[1.5rem] flex flex-wrap gap-6 ">
        <div class="w-full max-w-[280px] shadow-md rounded-md p-[1rem]">
            <img src="{{ asset('harry-potter.jpg') }}" class="object-cover w-full h-[200px] rounded-md"
                alt="Harry Potter">
            <div class="flex items-center justify-between mt-[1rem]">
                <h2 class="text-xl font-bold">Lorem Ipsum</h2>
                <a href="">
                    <button class="bg-[#EBD3F8] p-[0.4rem] rounded-md text-sm">Reading</button>
                </a>
            </div>
            <p class="text-md  text-gray-500">J.K Rowling</p>
            <div class="mt-[0.3rem]">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500 mt-1">Page 101 / 303</p>
                    <p class="text-sm text-gray-500 mt-1">30%</p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: 33%"></div>
                </div>
            </div>
            <p class="text-sm mt-[0.5rem] text-gray-500">Last read: 2 Oct 2025</p>
        </div>

        <div class="w-full max-w-[280px] shadow-md rounded-md p-[1rem]">
            <img src="{{ asset('harry-potter.jpg') }}" class="object-cover w-full h-[200px] rounded-md"
                alt="Harry Potter">
            <div class="flex items-center justify-between mt-[1rem]">
                <h2 class="text-xl font-bold">Lorem Ipsum</h2>
                <a href="">
                    <button class="bg-[#EBD3F8] p-[0.4rem] rounded-md text-sm">Reading</button>
                </a>
            </div>
            <p class="text-md  text-gray-500">J.K Rowling</p>
            <div class="mt-[0.3rem]">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500 mt-1">Page 101 / 303</p>
                    <p class="text-sm text-gray-500 mt-1">30%</p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: 33%"></div>
                </div>
            </div>
            <p class="text-sm mt-[0.5rem] text-gray-500">Last read: 2 Oct 2025</p>
        </div>

        <div class="w-full max-w-[280px] shadow-md rounded-md p-[1rem]">
            <img src="{{ asset('harry-potter.jpg') }}" class="object-cover w-full h-[200px] rounded-md"
                alt="Harry Potter">
            <div class="flex items-center justify-between mt-[1rem]">
                <h2 class="text-xl font-bold">Lorem Ipsum</h2>
                <a href="">
                    <button class="bg-[#EBD3F8] p-[0.4rem] rounded-md text-sm">Reading</button>
                </a>
            </div>
            <p class="text-md  text-gray-500">J.K Rowling</p>
            <div class="mt-[0.3rem]">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500 mt-1">Page 101 / 303</p>
                    <p class="text-sm text-gray-500 mt-1">30%</p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: 33%"></div>
                </div>
            </div>
            <p class="text-sm mt-[0.5rem] text-gray-500">Last read: 2 Oct 2025</p>
        </div>
    </div>
</x-layout>
