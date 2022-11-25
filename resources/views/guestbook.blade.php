<script src="https://cdn.tailwindcss.com">
    // tailwind.config.js
    module.exports = {
            // ...
            plugins: [
                // ...
                require('@tailwindcss/forms'),
            ],
        }

        <
        html class = "h-full bg-gray-50" >
        <
        body class = "h-full" >
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@if (Session::has('success'))
    <div>
        {{ Session::get('success') }}
    </div>
@endif


<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Gästebuch</h1>
            <p class="mt-2 text-sm text-gray-700">Eine Liste aller Einträge</p>
        </div>
        <div>
          <input type="search" name="search" id="search" placeholder="Suchbegriff hier eingeben...">
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ url('add-entry') }}"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Eintrag
                hinzufügen</a>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Titel</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Nachricht</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Ersteller</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white fulldata">
                            @foreach ($data as $entry)
                                <tr>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $entry->id }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $entry->title }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">{{ $entry->message }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @foreach ($users as $user)
                                            @if ($entry->users_id == $user->id)
                                                <p>{{ $user->name }}</p>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        @if ($entry->users_id == $user->id)
                                            <a href="{{ url('edit-entry/' . $entry->id) }}"
                                                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Bearbeiten</a>
                                            <a href="{{ url('delete-entry/' . $entry->id) }}"
                                                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Löschen</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody id="content" class="searchdata">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 px-4 sm:px-6 lg:px-8">
<a href="logout"
    class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Ausloggen</a>
</div>

<script type="text/javascript">
  $('#search').on('keyup', function(){

    $value=$(this).val();

    if($value){
      $('.fulldata').hide();
      $('.searchdata').show();
    }else{
      $('.fulldata').show();
      $('.searchdata').hide();
    }

    $.ajax({
      type:'get',
      url:'{{URL::to('search')}}',
      data:{'search':$value},

      success:function(data){
        console.log(data);
        $('#content').html(data);
      }
    });
  })
</script>