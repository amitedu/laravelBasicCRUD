<x-app-layout>
    <!-- component -->
    <div class="flex items-center justify-center h-screen">
        <div class="bg-gray-800 flex flex-col w-96 border border-gray-900 rounded-lg px-8 py-8">
            <div class="text-white">
                <h3 class="font-bold text-4xl text-center">Company Info</h3>
            </div>

            <div class="flex flex-col mt-10">
                <input type="text"
                       name="name"
                       placeholder="Name"
                       readonly
                       value="{{ $company->name }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">

                <input type="email"
                       name="email"
                       placeholder="Email"
                       readonly
                       value="{{ $company->email }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500 mt-8">

                <input type="text"
                       name="website"
                       placeholder="Website"
                       readonly
                       value="{{ $company->website }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500 mt-8">

                <img src="{{ $company->logo }}"
                     alt="" width="50" height="50"
                     class="rounded mt-8"
                >

                <a href="{{ route('company.edit', ['company' => $company]) }}"
                   class="text-center border border-blue-500 bg-blue-500 text-white rounded-lg py-2 px-2 font-semibold mt-8">
                    Edit
                </a>

                <a href="{{ route('company.index') }}"
                   class="text-center border border-gray-500 bg-gray-500 text-white rounded-lg py-2 px-2 font-semibold mt-8">
                    Cancel
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
