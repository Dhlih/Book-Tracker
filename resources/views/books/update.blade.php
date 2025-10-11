<x-layout>

    <h1 class="font-bold text-3xl mb-[1.5rem] ">Update Book</h1>
    @isset($book)
        <div class="max-w-2xl rounded-md shadow-lg p-[1.5rem] ">
            <img src="{{ asset('harry-potter.jpg') }}" class="object-cover w-full md:h-[350px] rounded-md" alt="Harry Potter">
            <div class="flex items-center justify-between mt-[1rem]">
                <div>
                    <h2 class="text-2xl font-bold">{{ $book->title }}</h2>
                    <span class="text-lg">{{ $book->author }}</span>
                </div>

                <form action="/books/update/{{ $book->id }}" method="PUT">
                    @csrf
                    <select name="status" id="status" class="bg-[#EBD3F8] p-[0.4rem] rounded-md outline-none ">
                        <option value="reading"$book->{{ $book->status == 'reading' ? 'Finished' : 'Reading' }}</option>
                        <option value="finished">{{ $book->status == 'reading' ? 'Reading' : 'Finished' }}</option>
                    </select>
                </form>

            </div>

            {{-- progress bar --}}
            <div class="mt-[0.5rem]">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500 mt-1">Page 101 / 303</p>
                    <p class="text-sm text-gray-500 mt-1">30%</p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: 33%"></div>
                </div>
            </div>

            {{-- reading logs  --}}
            <div class="mt-[1.5rem]">
                <h3 class="text-xl font-bold">Reading Logs</h3>
                <table class="w-full text-left text-sm">
                    <thead class="text-gray-500 ">
                        <tr>
                            <th class="py-3 font-medium">Date</th>
                            <th class="py-3 font-medium">Duration</th>
                            <th class="py-3 font-medium">Page</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="py-4">
                                <div class="font-semibold text-gray-800">Oct 11, 2025</div>
                                <div class="text-gray-500 text-xs">10:00 AM – 10:45 AM</div>
                            </td>
                            <td>45 minutes</td>
                            <td>Page 21 → 40</td>

                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-4">
                                <div class="font-semibold text-gray-800">Oct 10, 2025</div>
                                <div class="text-gray-500 text-xs">8:00 PM – 9:00 PM</div>
                            </td>
                            <td>1 hour</td>
                            <td>Page 1 → 20</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endisset

    <button class="fixed bottom-10 right-15 rounded-full bg-[#2E073F] cursor-pointer hover:bg-[#2E073F]/70 p-[0.5rem]">
        <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14m-7 7V5" />
        </svg>

    </button>

    {{-- modal --}}
    <div class="bg-black/50 fixed inset-0">
        <div class="max-w-md rounded-md shadow-lg">
            <h3>Add Log</h3>

        </div>
    </div>
</x-layout>
