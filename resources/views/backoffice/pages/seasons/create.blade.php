<x-layouts.backoffice>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seasons') }}
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
                                        label="{{ __('Edition') }}"
                                        name="edition"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Year') }}"
                                        name="year"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Saturday Date') }}"
                                        name="saturday_date"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Sunday Date') }}"
                                        name="sunday_date"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Pre Order Starts At') }}"
                                        name="pre_order_starts_at"
                                    ></livewire:form.input>
                                </div>

                                <div class="mb-6 pt-3 rounded">
                                    <livewire:form.input
                                        label="{{ __('Pre Order Ends At') }}"
                                        name="pre_order_ends_at"
                                    ></livewire:form.input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.backoffice>
