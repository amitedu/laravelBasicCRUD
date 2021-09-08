<x-app-layout>
    <div class="lg:container p-6 sm:px-20 mx-auto border-gray-200">
        <h2 class="text-2xl font-bold md:ml-16">Employees</h2>
    </div>

    <!-- Table dark design -->
    <div class="max-w-5xl px-2 mx-auto">
        <div class="flex justify-end">
            <a href="{{ route('employees.create') }}"
               class="mt-6 px-6 lg:mr-24 py-2 text-white font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-700 transition duration-300"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </a>
        </div>
        <table class="rounded-t-lg m-5 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
            <tr class="text-left border-b-2 border-indigo-300">
                <th class="px-4 py-3">Firstname</th>
                <th class="px-4 py-3">Lastname</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Company</th>
                <th class="px-4 py-3 text-center">Action</th>
            </tr>
            @foreach ($employees as $employee)
                <tr class="border-b border-indigo-400">
                    <td class="px-4 py-3">{{ $employee->first_name }}</td>
                    <td class="px-4 py-3">{{ $employee->last_name }}</td>
                    <td class="px-4 py-3">{{ $employee->email }}</td>
                    <td class="px-4 py-3">{{ $employee->phone }}</td>
                    <td class="px-4 py-3">{{ $employee->company->name }}</td>

                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <div class="flex justify-between space-x-1">
                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                               class="text-indigo-800 hover:text-indigo-900 p-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('employees.destroy', ['employee' => $employee]) }}" method="post"
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

        <div class="max-w-3xl px-2 mx-auto">{{ $employees->links() }}</div>
    </div>
</x-app-layout>
