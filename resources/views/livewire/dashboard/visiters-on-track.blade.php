<div>
    <h1 class="is-size-1">{{ __('Started Hikers') }}</h1>

    <div class="columns">
        <x-statistics title="5 KM" :value="$on_5_km"></x-statistics>
        <x-statistics title="10 KM" :value="$on_10_km"></x-statistics>
        <x-statistics title="15 KM" :value="$on_15_km"></x-statistics>
        <x-statistics title="25 KM" :value="$on_25_km"></x-statistics>
        <x-statistics title="40 KM" :value="$on_25_km"></x-statistics>
    </div>
</div>
