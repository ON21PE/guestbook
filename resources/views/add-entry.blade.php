<script src="https://cdn.tailwindcss.com">
  

    // tailwind.config.js
    module.exports = {
      // ...
      plugins: [
        // ...
        require('@tailwindcss/forms'),
      ],
    }
  
    <html class="h-full bg-gray-50">
    <body class="h-full">
  
  
</script>

<div>
    @if(Session::has('success'))
    <div>
    {{Session::get('success')}}    
    </div>
    @endif
    <form method="POST" action="{{url('save-entry')}}">
        @csrf
  <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
  <div class="mt-1">
    <input type="text" name="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 max-w-[200px] focus:ring-indigo-800 sm:text-sm" placeholder="Titel">
  </div>

  <label for="message" class="block text-sm font-medium text-gray-700">Nachricht</label>
  <div class="mt-1">
    <textarea type="text" name="message" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 max-w-[200px] focus:ring-indigo-800 sm:text-sm" placeholder="Deine Nachricht"> </textarea>
  </div>

  <input type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
  <a href="{{url('guestbook')}}" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"> Zurück </a>
</form>
  </div>