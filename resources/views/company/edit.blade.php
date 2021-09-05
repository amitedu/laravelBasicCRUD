<x-app-layout>
    <!-- component -->
    <div class="flex items-center justify-center h-screen">
        <div class="bg-gray-800 flex flex-col w-96 border border-gray-900 rounded-lg px-8 py-10">
            <div class="text-white mt-10">
                <h3 class="font-bold text-4xl">Company Info</h3>
            </div>
            <form action="{{ route('company.update', ['company' => $company]) }}" method="post"
                  enctype="multipart/form-data"
                  class="flex flex-col mt-10">
                @csrf
                @method('PATCH')

                <input type="text" name="name" placeholder="Name"
                       value="{{ old('name') ?? $company->name }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
                @error('name')
                <p class="text-red-500 text-xs mt-1">*{{ $message }}</p>
                @enderror

                <input type="text" name="website" placeholder="Website"
                       value="{{ old('website') ?? $company->website }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500 mt-8">
                @error('website')
                <p class="text-red-500 text-xs mt-1">*{{ $message }}</p>
                @enderror

                <input type="email" name="email" placeholder="Email"
                       value="{{ old('email') ?? $company->email }}"
                       class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500 mt-8">
                @error('email')
                <p class="text-red-500 text-sm mt-1">*{{ $message }}</p>
                @enderror

                <input type="file" name="logo" class="mt-8 text-white">
                @error('logo')
                <p class="text-red-500 text-xs mt-1">*{{ $message }}</p>
                @enderror


                <button
                    class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold mt-8">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
