<x-layouts.backoffice>
    <div class="p-5">
        <div class="column is-12">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Seasons') }}
                </h2>
            </x-slot>

            <livewire:table
                model="\App\Models\Season"
                :queryOn="['year', 'edition']"
                routeKey="seasons"
                :headers="[
                'edition' => ['title' => 'Edition', 'width' => '20%', 'sortable' => true],
                'year' => ['title' => 'Year At', 'width' => '20%', 'sortable' => true],
                'saturday_date' => ['title' => 'Date Saturday', 'sortable' => true],
                'sunday_date' => ['title' => 'Date Sunday', 'sortable' => true],
            ]"/>
        </div>
    </div>
</x-layouts.backoffice>
