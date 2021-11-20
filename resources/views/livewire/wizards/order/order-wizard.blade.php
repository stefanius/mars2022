<div>
    @if($step === 1)
        @include('livewire.wizards.order.partials.register-step-1')
    @endif

    @if($step === 2)
        @include('livewire.wizards.order.partials.register-step-2')
    @endif

    @if($step === 3)
        @include('livewire.wizards.order.partials.register-step-3')
    @endif

    @if($step === 4)
        @include('livewire.wizards.order.partials.register-step-4')
    @endif
</div>
