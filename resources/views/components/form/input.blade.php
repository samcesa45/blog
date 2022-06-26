 @props(['name','type'=> 'text'])
 <div class="mb-4">
           <x-form.label name="{{$name}}"/>
            <input type="{{$type}}" class='border p-1 border-gray-300 rounded w-full focus:outline-none focus:ring' value="{{old($name)}}" name="$name" id="$name">
           <x-form.error name="{{$name}}"/>
        </div>