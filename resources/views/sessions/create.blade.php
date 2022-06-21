<x-app>
<section class="px-6 py-8">
    <main class='max-w-lg mx-auto mt-10'>
        <form action="/login" method="post">
            @csrf
            <div class="max-w-md mx-auto p-4 rounded-md shadow-lg border broder-gray-300">
            <h1 class="text-center text-blue-500 font-bold mb-4 text-xl">Log in</h1>
            
            
            <div class="mb-4">
                <label for="email" class='uppercase block font-bold text-xs mb-2 text-gray-700'>Email</label>
                <input type="email" class='border border-gray-300 w-full p-1 rounded text-gray-500 focus:border-gray-300 outline-none' name="email" id="email" value="{{old('email')}}" required>
             @error('email')
                <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class='uppercase block font-bold text-xs mb-2 text-gray-700'>Password</label>
                <input type="password" class='border border-gray-300 w-full p-1 rounded text-gray-500 focus:border-gray-300 outline-none' name="password" id="password" required>
             @error('password')
                <p class='text-red-500 text-xs mt-1'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="rounded py-1 px-2 bg-blue-500 w-full text-white hover:bg-blue-400" >Login</button> 
            </div>
            </div>
        </form>
    </main>
</section>
</x-app>