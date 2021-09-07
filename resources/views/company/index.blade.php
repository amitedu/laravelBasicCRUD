<x-app-layout>
    <div class="lg:container p-6 sm:px-20 bg-white border-b mx-auto border-gray-200">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold ml-16 text-center">Companies</h2>
            <div>
                <a href="{{ route('company.index') }}" class="px-4 py-2 border border-blue-500 bg-blue-500 text-white rounded ml-2 hover:bg-blue-600 font-semibold">Simple table</a>
                <a href="{{ route('company.livewireDataTable') }}" class="px-4 py-2 border border-blue-500 bg-blue-500 text-white rounded ml-2 hover:bg-blue-600 font-semibold">Livewire DataTable</a>
                <a href="" class="px-4 py-2 border border-blue-500 bg-blue-500 text-white rounded ml-2 hover:bg-blue-600 font-semibold">Yjra DataTable</a>
            </div>
        </div>
    </div>

    <!-- Table dark design -->
    <div class="max-w-6xl px-2 mx-auto">
        <div class="flex justify-end">
            <a href="{{ route('company.create') }}"
               class="mt-6 px-4 py-2 text-white font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-400 transition duration-300"
            >
                Create
            </a>
        </div>
        <table id="myTable"
               class="rounded-t-lg m-5 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
            <tr class="text-left border-b-2 border-indigo-300">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Website</th>
                <th class="px-4 py-3">Logo</th>
                <th class="px-4 py-3 text-center">Action</th>
            </tr>
            @foreach ($companies as $company)
                <tr class="border-b border-indigo-400">
                    <td class="px-4 py-3">{{ $company->name }}</td>
                    <td class="px-4 py-3">{{ $company->email }}</td>
                    <td class="px-4 py-3">{{ $company->website }}</td>
                    <td class="px-4 py-3">
                        <img src="{{ $company->logo }}"
                             alt="" width="50" height="50"
                             class="rounded"
                        >
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <div class="flex justify-between space-x-1">
                            <a href="{{ route('company.show', ['company' => $company]) }}" class="text-gray-100 hover:text-gray-300 p-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </a>

                            <a href="{{ route('company.edit', ['company' => $company->id]) }}" class="text-indigo-800 hover:text-indigo-900 p-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </a>

                            <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="post"
                                  class="inline-flex"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('Sure, want to delete?')"
                                >
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="max-w-4xl mx-auto">{{ $companies->links() }}</div>
    </div>

</x-app-layout>
