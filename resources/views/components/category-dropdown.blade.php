@props(['categories'])
<select id='selectedDropdown' class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold overflow-auto max-h-52">
    <option value="category" disabled selected>{{isset($currentCategory) ? ucwords($currentCategory->name) : 'Category'}}
    </option>
        <option value="/" class="{{request()->routeIs('home') ? 'bg-blue-500 text-white' : ''}}">All</option>
    @foreach($categories as $category)
    <option value="/?category={{$category->slug}}&{{http_build_query(request()->except('category','page'))}}" 
    class="{{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
    {{$category->name}}</option>
    
    @endforeach
</select>

<x-icon name="dropdown" class="absolute pointer-events-none"/>