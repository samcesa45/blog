@props(['name','row'=>'2'])
<div class="mb-4">
            <x-form.label name="{{$name}}"/>
            <textarea type="text" class='border p-1 border-gray-300 rounded w-full focus:outline-none focus:ring' cols="30" rows="{{$row}}"  placeholder="type here..." name="{{$name}}" id="{{$name}}">{{old($name)}}</textarea>
           <x-form.error name="{{$name}}"/>
        </div>