<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Laravel From Scratch Blog</title>
</head>
<style>
    :root{
        --tw-bg-opacity:1;
        background-color:
       color:rgb(255,255,255);
       opacity:1;
      
    }
   
    html{
       scroll-behavior:smooth; 
    }
    .show{
        display:block;
    }
    .active{
        color:rgb(255,255,255);
        opacity: var(--tw-bg-opacity);
        background-color: rgb(59 130 246);
    }
</style>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                <span class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}} !</span>
                   <div class='relative inline-block text-right mx-2' id='dropdownContainer'>
                       <div class='w-32 dropdownBtn'>
                           <button type='button' class='dropdownbtn inline-flex w-full justify-center 
                           rounded-md border border-gray-300 shadow-sm px-4 py-1 
                           bg-white text-xs font-normal text-gray-700 
                           hover:bg-gray-50 focus:outline-none focus:ring-2 
                           focus:ring-offset-2 focus:ring-offset-gray-100 
                           focus:ring-indigo-500' id='menu-button' aria-expanded='true'>
                           {{auth()->user()->name}}</button>
                          <div  class="inline-block text-right absolute right-1 top-1 ml-2">
                           <!-- Heroicon name: solid/chevron-down  --> 
                             <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </div>
                       </div>

                       <div id='dropdownContent' class='hidden z-10 origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg ring-1 ring-black bg-white ring-opacity-5 focus:outline-none'>
                           <div class='py-1 text-left'>
                               <a href="/" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white {{(request()->is('/')) ? 'active' : ''}}">Dashboard</a>
                               <a href="/admin/posts/create" 
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white {{(request()->is('admin/posts/create')) ? 'active' : ''}}" >New Post</a>
                               <a href="" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white {{(request()->is('admin/posts/profile')) ? 'active' : ''}}">Profile</a>
                               <form action="/logout" method="post">
                                   @csrf
                                   <button type="submit" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white {{(request()->is('admin/logout')) ? 'active' : ''}}">Logout</button>
                               </form>
                           </div>
                       </div>
                   </div>           
                @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-4 text-blue-500 text-xs font-bold uppercase">Log in</a>
                @endauth
                <a href="#newsletter" class="btn">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

       {{$slot}}
        <footer id='newsletter' class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" name='email' placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                @error('email')
                                <span class="text-xs text-red-500">{{$message}}</span>
                                @enderror
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    @if(session()->has('success'))
<div id='flashMessage' class='fixed bottom-3 right-3  text-sm bg-blue-500 text-white px-4 py-2 border border-gray-50 rounded'>
    <p>{{session('success')}}</p>
</div>
    @endif
</body>

<script>
const dropdownBtn = document.querySelector('.dropdownBtn')
const dropdown = document.getElementById('dropdownContent')

//click button to toggle dropdown
   dropdownBtn.addEventListener('click',(e)=>{
        dropdown.classList.toggle('show')
    })



//close the dropdown when the user clicks outside of it 
window.onclick = function(event){
     if(!event.target.matches('.dropdownbtn')){
        let dropdowns = document.querySelectorAll('#dropdownContent')
        for(let i =0;i < dropdowns.length;i++){
            let openDropdown = dropdowns[i]
            if(openDropdown.classList.contains('show')){
                openDropdown.classList.remove('show')
            }
        }
    }
}
</script>



