<x-layout>
    @if (session('success'))
      <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-orange-500 text-white p-2 rounded mb-4">
            {{ $errors->first('email') }}
        </div>
    @endif
  <form method="POST" action="/formtest">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-white/10">
      <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
        <div class="sm:col-span-4">
          <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
            </div>
            <div class="mt-3 flex items-center gap-x-6 justify-end">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
        </form>
          </div>
          <div class="mt-3 p-5">
            <h2 class="text-lg font-semibold text-white">Emails</h2>
            @if (count($emails) > 0)
                <form method="POST" action="/clear-emails" class="mt-4">
                    @csrf
                    <button type="submit" 
                            onclick="return confirm('Are you sure you want to delete everything?')"
                            class="rounded-md bg-red-500 text-white-400 hover:bg-red-700 px-3 py-2 text-sm font-semibold focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">
                        Clear All Emails
                    </button>
                </form>
              @endif
            <ul>
                @foreach ($emails as $index => $email)
                    <li class="flex justify-between items-center text-sm p-1">
                        {{ $email }}
                        <form method="POST" action="/delete-email/{{ $index }}">
                            @csrf
                            <button class="text-red-500 hover:underline text-xs">x</button>
                        </form>
                    </li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>