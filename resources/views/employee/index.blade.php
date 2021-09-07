<x-app-layout>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <a href="{{ route('employees.create') }}"
           class="w-full mt-6 px-4 py-2 text-white font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-400 transition duration-300"
        >Create</a>
    </div>

    <!-- Table dark design -->
    <p class="text-lg text-center font-bold m-5">Employees</p>
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

                <td class="px-4 py-3">
                    <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                       class="px-2 py-1 bg-green-400 rounded text-white">
                        Edit
                    </a>
                    <form action="{{ route('employees.destroy', ['employee' => $employee]) }}" method="post"
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

    <div class="max-w-3xl px-2 mx-auto">{{ $employees->links() }}</div>
</x-app-layout>
