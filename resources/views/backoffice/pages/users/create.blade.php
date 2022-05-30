<x-layouts.backoffice>
    <div class="p-5">


        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </x-slot>


        <form role="form" method="post" action="{{ action('Backoffice\Users\UsersController@store') }}">
            @csrf

            <livewire:form.input label="{{ __('Name') }}" name="name"></livewire:form.input>

            <livewire:form.input label="{{ __('Email') }}" name="email"></livewire:form.input>

            <livewire:form.input label="{{ __('Password') }}" name="password"></livewire:form.input>

            <livewire:form.input label="{{ __('Admin') }}" name="admin"></livewire:form.input>

            <livewire:form.input label="{{ __('Locale') }}" name="locale"></livewire:form.input>

            <livewire:form.input label="{{ __('Login Window Starts') }}" name="login_window_starts_at"></livewire:form.input>

            <livewire:form.input label="{{ __('Login Window Ends') }}" name="login_window_ends_at"></livewire:form.input>


              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-link">Submit</button>
                </div>
                <div class="control">
                  <button class="button is-link is-light">Cancel</button>
                </div>
              </div>

        </form>
    </div>
</x-layouts.backoffice>
