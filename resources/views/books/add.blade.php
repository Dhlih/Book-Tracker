<x-layout>
    <h1 class="font-bold text-3xl mb-[1.5rem] ">Add Book</h1>
    <div class="max-w-xl rounded-md shadow-lg p-[1.5rem] ">
        <form action="/books/add" method="POST" class="flex flex-col space-y-[1rem]">
            @csrf
            <div class="flex flex-col space-y-[0.5rem]">
                <label for="cover" class="font-semibold">Cover</label>
                <img class="cover w-full h-[350px] object-cover" src="" alt="">
                <input type="hidden" name="cover" class="cover-input">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="cover" class="font-semibold">Title</label>
                <input name="title" class="title w-full bg-[#EBD3F8] rounded-md p-[0.5rem] "
                    placeholder="Example : Harry Potter">
                <div id="suggestions" class="bg-white shadow-md rounded-md mt-2"></div>

            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="author" class="font-semibold">Author</label>
                <input name="author" class="author w-full bg-[#EBD3F8] rounded-md p-[0.5rem] "
                    placeholder="Example : JK. Rowling">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="total_page" class="font-semibold">Total page</label>
                <input type="number" name="total_page" class="total-page w-full bg-[#EBD3F8] rounded-md p-[0.5rem] "
                    placeholder="Example : 500">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="status" class="font-semibold">Status</label>
                <select name="status" id="status" class="w-full bg-[#EBD3F8] rounded-md p-[0.5rem] ">
                    <option value="">-- Pilih Status --</option>
                    <option value="finished">Finished</option>
                    <option value="reading">Reading</option>
                </select>
            </div>

            <button type="submit"
                class="mt-[1rem] bg-[#2E073F] hover:bg-[#2E073F]/70 cursor-pointer w-full p-[0.5rem] rounded-md text-white">
                Add book
            </button>

            @if ($errors->any())
                <div class="text-red-500 mt-[0.5rem]">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>*{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>

    <script>
        const titleInput = document.querySelector(".title");
        const suggestions = document.getElementById("suggestions");
        let debounceTimer;

        titleInput.addEventListener("input", async (evt) => {
            const query = evt.target.value.trim();

            if (query.length < 2) {
                console.log("terlalu pendek judulnya");
                suggestions.innerHTML = "";
                return;
            }

            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(async () => {

                try {
                    const response = await fetch(
                        `/books/search/google?q=${encodeURIComponent(query)}`);
                    const books = await response.json();

                    suggestions.innerHTML = "";
                    books.forEach(book => {
                        const div = document.createElement("div");
                        div.className = "p-2 hover:bg-gray-100 cursor-pointer";
                        div.textContent = `${book.title} | ${book.author}`;
                        div.addEventListener("click", () => {
                            titleInput.value = book.title;
                            document.querySelector("input[name='author']").value =
                                book.author;
                            document.querySelector("img").src = book.cover ?? '';
                            document.querySelector(".cover-input").value = book
                                .cover ?? '';
                            document.querySelector(".total-page").value = book
                                .total_page ?? '';
                            suggestions.innerHTML = "";
                        });
                        suggestions.appendChild(div);
                    });
                } catch (error) {
                    console.error("Gagal mengambil data:", error);
                }
            }, 500); // tunggu 500ms setelah user berhenti mengetik

        });
    </script>

</x-layout>
