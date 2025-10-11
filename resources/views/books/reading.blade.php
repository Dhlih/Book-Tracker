<x-layout>
    <h1 class="font-bold text-3xl mb-[1.5rem] ">Books Reading</h1>
    <div class="flex items-center space-x-[1rem]">
        <input type="text"
            class="w-full md:max-w-[280px] bg-[#AD49E1] rounded-md p-[0.4rem] px-[0.8rem] text-white outline-none"
            placeholder="Search book...">
        <button class="bg-[#EBD3F8]  hover:bg-[#EBD3F8]/70 rounded-md py-[0.4rem] px-[0.8rem] cursor-pointer">
            <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="26"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>

        </button>
    </div>
    <div class="books-container mt-[1.5rem] flex flex-wrap gap-6 mb-[5rem]">
        <div class="w-full md:max-w-[280px]  rounded-md p-[1rem] shadow-lg">
            <img src="{{ asset('harry-potter.jpg') }}" class="object-cover w-full md:h-[200px] h-[250px] rounded-md"
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
