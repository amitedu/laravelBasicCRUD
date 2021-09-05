<x-app-layout>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <a href="{{ route('company.create') }}"
       class="w-full mt-6 px-4 py-2 text-white font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-400 transition duration-300"
    >Create</a>
    </div>

    <!-- Table dark design -->
    <p class="text-lg text-center font-bold m-5">Companies</p>
    <table class="rounded-t-lg m-5 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
        <tr class="text-left border-b-2 border-indigo-300">
            <th class="px-4 py-3">Firstname</th>
            <th class="px-4 py-3">Lastname</th>
            <th class="px-4 py-3">Age</th>
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
                <td class="px-4 py-3">
                    <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                       class="px-2 py-1 bg-green-400 rounded text-white">
                        Edit
                    </a>
                    <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="post"
                          class="inline-flex"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="px-2 py-1 ml-2 bg-red-400 rounded text-white text-sm"
                                onclick="return confirm('Sure, want to delete?')"
                        >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="max-w-3xl px-2 mx-auto">{{ $companies->links() }}</div>
</x-app-layout>
