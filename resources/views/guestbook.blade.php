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
<a href="{{url('add-entry')}}" class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Eintrag hinzufügen</a>

@foreach ($data as $entry)
    <p><b> {{$entry->title}}</b></p>
    <p> {{$entry->message}}</p>
    <p> {{$entry->created_at}}</p>

    <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Button text</button>

@endforeach


<a href="logout" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Ausloggen</a>