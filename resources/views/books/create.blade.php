<x-layout>
    <h1 class="font-bold text-3xl mb-[1.5rem] ">Add Book</h1>
    <div class="max-w-xl rounded-md shadow-lg p-[1.5rem] ">
        <form action="/books" method="POST" class="flex flex-col space-y-[1rem]">
            @csrf
            <div class="flex flex-col space-y-[0.5rem]">
                <label for="cover">Title</label>
                <input name="title" class="w-full bg-white rounded-md p-[0.5rem]">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="author">Author</label>
                <input name="author" class="w-full bg-white rounded-md p-[0.5rem]">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="total_page">Total page</label>
                <input type="number" name="total_page" class="w-full bg-white rounded-md p-[0.5rem]">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="status">Status</label>
                <input name="status" class="w-full bg-white rounded-md p-[0.5rem]">
            </div>

            <div class="flex flex-col space-y-[0.5rem]">
                <label for="cover">Cover</label>
                <input name="cover" class="w-full bg-white rounded-md p-[0.5rem]">
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

</x-layout>
