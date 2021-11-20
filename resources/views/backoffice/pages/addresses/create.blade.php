<x-layouts.backoffice>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Addresses') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="grid grid-cols-8 gap-4">
                <div class="col-start-3 col-span-4">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                            <form role="form" method="post" action="{{ action('Backoffice\Addresses\AddressesController@store') }}">
                                @csrf

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Name') }}"
                                        name="name"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Street Address') }}"
                                        name="street_address"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Postal Code') }}"
                                        name="postal_code"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('City') }}"
                                        name="city"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Email') }}"
                                        name="email"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">{{ __('Send Poster') }}</label>
                                    <input name="send_poster" type="checkbox" checked value="1" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3 ">
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">{{ __('Send Email') }}</label>
                                    <input name="send_email" type="checkbox" checked value="1" class="bg-gray-200 rounded text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3 ">
                                </div>

                                <div class="mb-6 pt-3">
                                    <button class="min-w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.backoffice>
