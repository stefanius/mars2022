<x-layouts.backoffice>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>

        {{-- <a href="{{ route('users.edit', $user) }}">{{ 'update' }}</a> --}}
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-8 gap-4">
            <div class="col-start-3 col-span-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <strong>{{ __('Name') }}: </strong> {{ $user->name }}<br/>
                        <strong>{{ __('Email') }}: </strong> {{ $user->email }}<br/>
                        <strong>{{ __('Locale') }}: </strong> {{ $user->locale }}<br/>
                        <strong>{{ __('Suspended') }}: </strong> {{ $user->isSuspended() ? 'Yes' : 'No' }}<br/>
                        <strong>{{ __('Admin') }}: </strong> {{ $user->isAdmin() ? 'Yes' : 'No' }}<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.backoffice>
