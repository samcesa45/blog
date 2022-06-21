@props(['comment'])
<article class='flex items-center p-8 bg-gray-100 border border-gray-200 space-x-4 rounded-xl mb-4'>
    <div class='flex-shrink-0'>
        <img class=' rounded-full'  src="https://i.pravatar.cc/60?u{{$comment->id}}" alt="avatar" width="60" height="60" >
    </div>
    <div class='ml-3'>
    <header >
        @php
          
       
        @endphp
        <h3 class='font-bold'>{{optional($comment->author)->username}}</h3>
        <p class="text-xs">
            Posted 
            <time class='text-gray-400'>{{$comment->created_at}}</time>
            </p>
    </header> 

    <p>{{$comment->body}}</p>
    </div>
</article>