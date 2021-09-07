<div class="flex flex-col mt-8 container mx-auto">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="max-w-sm w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model.debounce.300ms="search"
                               id="search"
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                               placeholder="Search" type="search">
                    </div>
                </div>
                <div class="relative flex items-start">
                    <select wire:model="perPage"
                            class="border border-gray-700 rounded text-white h-10 pl-3 pr-12 bg-gray-700 hover:border-gray-400 appearance-none">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <div class="flex items-center">
                        <a href="{{ route('company.create') }}" class="px-4 py-2 ml-2 bg-blue-500 text-white rounded font-semibold">Add</a>
                    </div>
                    <div class="ml-2 px-4 py-2 bg-red-500 text-white rounded font-semibold">
                        <button wire:click="deleteCompanies()" onclick="return confirm('Sure, delete selected companies?')">Delete Selected</button>
                    </div>
                </div>
            </div>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th
                            class="pl-4 py-3 text-left">
                            <div class="flex items-center">
                                <input id="active" type="checkbox"
                                       class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                            </div>
                        </th><th
                            class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('name')"
                                    class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex items-center">
                                    Name
{{--                                    <x-sort-icon--}}
{{--                                        field = "name"--}}
{{--                                        :sortField = "$sortField"--}}
{{--                                        :sortAsc = "$sortAsc"--}}
{{--                                    />--}}
                                    @if($sortField !== 'name')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    @elseif($sortAsc)
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th
                            class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('email')"
                                    class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex items-center">
                                    Email
                                    @if($sortField !== 'email')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    @elseif($sortAsc)
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    @endif
                                </button>

                            </div>
                        </th>
                        <th
                            class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('website')"
                                    class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex items-center">
                                    Website
                                    @if($sortField !== 'website')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    @elseif($sortAsc)
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th
                            class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Logo
                                </button>
                            </div>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($companies as $company)
                            <tr>
                                <td class=" pl-4  py-4 whitespace-no-wrap">
                                    <input wire:model="selected" value="{{ $company->id }}" type="checkbox"
                                           class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                </td>
                                <td class="w-3/12 px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $company->name }}
                                    </div>
                                </td>
                                <td class="w-3/12 px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $company->email }}
                                    </div>
                                </td>
                                <td class="w-3/12 px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        <a href="">{{ $company->website }}</a>
                                    </div>
                                </td>
                                <td class="w-1/12 px-2 py-1 whitespace-no-wrap">
                                    <img src="{{ $company->logo }}" alt="Company's logo" height="50px" width="50px" class="rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <div class="flex justify-between">
                                        <a href="{{ route('company.show', $company) }}" class="text-gray-600 hover:text-gray p-1">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('company.edit', $company) }}" class="text-indigo-600 hover:text-indigo-900 p-1">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('company.destroy', $company) }}" method="post" class="inline-flex text-red-500 hover:text-red-700">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('Sure, delete company?')">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
    <div class="h-96"></div>
</div>
