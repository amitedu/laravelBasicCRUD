<x-app-layout>
    <!-- component -->
    <div class="flex items-center justify-center h-screen">
        <div class="bg-gray-800 flex flex-col w-96 border border-gray-900 rounded-lg px-8 py-8">
            <div class="text-white">
                <h3 class="font-bold text-4xl text-center">Employee Info</h3>
            </div>

            <form action="{{ route('employees.store') }}" method="post"
                  class="flex flex-col mt-10">
                @csrf

                <input type="text"
                       name="first_name"
                       placeholder="First Name"
                       value="{{ old('first_name') }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 text-white placeholder-gray-500">
                @error('first_name')
                <p class="text-red-500 text-xs mt-1">*{{ $message }}</p>
                @enderror

                <input type="text"
                       name="last_name"
                       placeholder="Last Name"
                       value="{{ old('last_name') }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 text-white placeholder-gray-500 mt-8">
                @error('last_name')
                <p class="text-red-500 text-xs mt-1">*{{ $message }}</p>
                @enderror

                <input type="email"
                       name="email"
                       placeholder="Email"
                       value="{{ old('email') }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 text-white placeholder-gray-500 mt-8">
                @error('email')
                <p class="text-red-500 text-sm mt-1">*{{ $message }}</p>
                @enderror

                <input type="text"
                       name="phone"
                       placeholder="Phone"
                       value="{{ old('phone') }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 text-white placeholder-gray-500 mt-8">
                @error('phone')
                <p class="text-red-500 text-xs mt-1">*{{ $message }}</p>
                @enderror

                <!-- Select Dropdown component -->
                <div class="inline-flex mt-8">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" viewBox="0 0 412 232">
                        <path
                            d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                            fill="#648299" fill-rule="nonzero"/>
                    </svg>
                    <select name="company_id"
                        class="border border-gray-700 rounded-lg text-white h-10 pl-5 pr-10 bg-gray-700 hover:border-gray-400 appearance-none">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                        class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold mt-8">
                    Submit
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
