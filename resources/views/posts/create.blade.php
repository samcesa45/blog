<x-app>
<section class="px-6 py-8">
    <main class='max-w-lg mx-auto mt-10'>
   <form action="/admin/posts" method="post" enctype="multipart/form-data">
       @csrf
       <div class='max-w-md mx-auto border border-gray-300 p-8 rounded shadow-lg'>
        <h1 class="text-center text-blue-500 font-bold mb-4 text-xl">Publish New Post</h1>
       <x-form.input name="title"/>
       <x-form.input name="slug"/>
       <x-form.input name="image" type="file"/>
        <x-form.textarea name="excerpt"/>
        <x-form.textarea name="body" row="5"/>
       
        <div class='mb-4'>
            <x-form.label name="category"/>
            <select name="category_id" id="category_id" class="w-full p-2">
                @php 
                    $categories = \App\Models\Category::all();
                @endphp
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
            </select>
             @error('category_id')
            <span class="text-red-500 text-xs mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class='text-right mt-4'>
            <button class='px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600'>Publish</button>
        </div>
        </div>
   </form>
   </main>
</section>
</x-app>