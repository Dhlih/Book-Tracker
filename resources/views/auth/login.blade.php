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
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="flex items-center space-x-[1rem] mb-[1.5rem]">
            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                    clip-rule="evenodd" />
            </svg>

            <h1 class="font-bold text-2xl text-center ">Reading Tracker</h1>
        </div>

        <div class="w-full max-w-xs rounded-md shadow-md p-[1.5rem] bg-[#AD49E1] text-white">
            <h2 class="font-bold text-2xl mb-[1rem]">Login</h2>
            <form action="" class="flex flex-col space-y-[1rem]">
                <div class="flex flex-col space-y-[0.5rem]">
                    <label for="" class="font-semibold ">Email :</label>
                    <input type="text" class="bg-white text-black rounded-md p-[0.5rem]"
                        placeholder="Type your email...">
                </div>
                <div class="flex flex-col space-y-[0.5rem]">
                    <label for="" class="font-semibold ">Password :</label>
                    <input type="text" class="bg-white text-black rounded-md p-[0.5rem]"
                        placeholder="Type your password...">
                </div>

                {{-- error status --}}
                @if ($errors->any())
                    <div class="text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <button type="submit"
                    class="rounded-md w-full mt-[1rem] text-black font-semibold p-[0.5rem] bg-[#EBD3F8]">Register</button>
            </form>
            <span class="block mt-[1rem]">Don't have an account ?
                <a href="/register" class="hover:font-semibold">Register</a>
            </span>
        </div>

    </div>
</body>

</html>
