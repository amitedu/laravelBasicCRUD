<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <a href="{{ route('company.index') }}"
               class="text-xl font-semibold leading-tight border border-blue-500 px-4 py-2 rounded hover:bg-blue-600 bg-blue-500 text-white">{{__('Companies')}}</a>
            <a href="{{ route('employees.index') }}"
               class="text-xl font-semibold leading-tight border border-blue-500 px-4 py-2 rounded hover:bg-blue-600 bg-blue-500 text-white">{{__('Employees')}}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
