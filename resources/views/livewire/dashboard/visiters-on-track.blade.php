<div>
    <h1 class="is-size-1">{{ __('Started Hikers') }}</h1>

    <div class="columns">
        @foreach ($statistics as $distance => $statistic)
            <x-statistics :title="$distance . ' KM'" :value="$statistic"></x-statistics>
        @endforeach
    </div>
</div>
