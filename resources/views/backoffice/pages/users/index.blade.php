<x-layouts.backoffice>
    <div class="p-5">
        <div class="column is-12">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Users') }}
                </h2>
            </x-slot>

            <livewire:table
                model="\App\Models\User"
                :queryOn="['name', 'email']"
                routeKey="users"
                :headers="[
                'name' => ['title' => 'Name', 'sortable' => true],
                'email' => ['title' => 'Email', 'sortable' => true],
                'suspended_at' => ['title' => 'Suspended At', 'width' => '10%', 'sortable' => true],
                'login_window_starts_at' => ['title' => 'Login Window Starts At', 'width' => '10%', 'sortable' => true],
                'login_window_ends_at' => ['title' => 'Login Window Ends At', 'width' => '10%', 'sortable' => true],
            ]"/>
        </div>
    </div>
</x-layouts.backoffice>
