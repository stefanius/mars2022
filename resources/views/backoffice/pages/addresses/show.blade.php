<x-layouts.backoffice>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $address->name }}
        </h2>

        <a href="{{ route('addresses.edit', $address) }}">{{ 'update' }}</a>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-8 gap-4">
            <div class="col-start-3 col-span-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <strong>{{ __('Type') }}: </strong> {{ $address->addressType->name ?? '' }}<br/>
                        <strong>{{ __('Name') }}: </strong> {{ $address->name  }}<br/>
                        <strong>{{ __('Address') }}: </strong> {{ $address->street_address  }}<br/>
                        <strong>{{ __('Postal code') }}: </strong> {{ $address->postal_code  }}<br/>
                        <strong>{{ __('City') }}: </strong> {{ $address->city  }}<br/>
                        <strong>{{ __('Email') }}: </strong> {{ $address->email }}<br/>
                        <hr/>
                        <strong>{{ __('Send poster') }}: </strong> {{ $address->send_poster ? 'Yes' : 'No' }}<br/>
                        <strong>{{ __('Send email') }}: </strong> {{ $address->send_email ? 'Yes' : 'No' }}<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.backoffice>
