<x-layout>

    <h1 class="font-bold text-3xl mb-[1.5rem] ">Update Book</h1>
    @isset($book)
        <div class="max-w-2xl rounded-md shadow-lg p-[1.5rem] ">
            <img src={{ $book->cover }} class="object-cover w-full md:h-[450px] rounded-md" alt="Harry Potter">
            <div class="flex items-center justify-between mt-[1rem]">
                <div>
                    <h2 class="text-2xl font-bold">{{ $book->title }}</h2>
                    <span class="text-lg">Author : {{ $book->author }}</span>
                </div>

                <form action="/books/update/{{ $book->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" id="status" onchange="this.form.submit()"
                        class="bg-[#EBD3F8] p-[0.4rem] rounded-md outline-none">
                        <option value="reading" {{ $book->status == 'reading' ? 'selected' : '' }}>Reading</option>
                        <option value="finished" {{ $book->status == 'finished' ? 'selected' : '' }}>Finished</option>
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
                        @foreach ($book->logs as $log)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4">
                                    <div class="font-semibold text-gray-800">
                                        {{ \Carbon\Carbon::parse($log->read_at)->format('M d, Y') }}</div>
                                    {{-- Kalau ada jam mulai/selesai bisa ditambahkan --}}
                                </td>
                                <td>{{ $log->duration }} minutes</td>
                                <td>Page {{ $log->page_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal bg-black/50 fixed inset-0 flex justify-center items-center hidden">
            <div class="w-full max-w-sm rounded-md bg-[#EBD3F8] p-[1.5rem] mt-[1rem]">
                <h3 class="font-bold text-2xl">Add Log</h3>

                {{-- Form Update --}}
                <form action="/logs" method="POST" class="flex flex-col space-y-[1rem] mt-[1rem]">
                    @csrf
                    <input type="hidden" name="book_id" value={{ $book->id }}>
                    <div class="flex flex-col space-y-[0.5rem]">
                        <label for="read_at" class="font-semibold">Date</label>
                        <input type="date" name="read_at" class="w-full bg-white rounded-md p-[0.5rem]" required>
                    </div>

                    <div class="flex flex-col space-y-[0.5rem]">
                        <label for="duration" class="font-semibold">Duration</label>
                        <input type="number" name="duration" class="w-full bg-white rounded-md p-[0.5rem]"
                            placeholder="Duration in minutes" required>
                    </div>

                    <div class="flex flex-col space-y-[0.5rem]">
                        <label for="page_number" class="font-semibold">Total Page</label>
                        <input type="number" name="page_number" class="w-full bg-white rounded-md p-[0.5rem]"
                            placeholder="Example: 100" required>
                    </div>

                    <button
                        class="submit-btn w-full p-[0.5rem] cursor-pointer bg-[#2E073F] hover:bg-[#2E073F]/70 rounded-md text-white mt-[1rem]"
                        type="submit">
                        Add
                    </button>
                </form>
            </div>
        </div>
    @endisset

    {{-- Tombol untuk membuka modal --}}
    <button
        class="open-modal-btn fixed bottom-12 left-1/2 -translate-x-1/2 md:bottom-10 md:right-15 md:left-auto rounded-full bg-[#2E073F] cursor-pointer hover:bg-[#2E073F]/70 p-[0.5rem]">
        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14m-7 7V5" />
        </svg>
    </button>

    <script>
        const openBtn = document.querySelector(".open-modal-btn");
        const modal = document.querySelector(".modal");

        // klik tombol + untuk menampilkan/menyembunyikan modal
        openBtn.addEventListener("click", function(evt) {
            evt.preventDefault();
            modal.classList.toggle("hidden");
        });

        // klik di luar form untuk menutup modal
        modal.addEventListener("click", function(evt) {
            if (evt.target === modal) {
                modal.classList.add("hidden");
            }
        });
    </script>


</x-layout>
