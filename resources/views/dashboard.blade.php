<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <a href="{{ route('company.index') }}" class="text-xl font-semibold text-gray-800 leading-tight">{{__('Companies')}}</a>
            <a href="" class="text-xl font-semibold text-gray-800 leading-tight">{{__('Employees')}}</a>
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
