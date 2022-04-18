<div @if(auth()->user()->isAdmin()) class="column is-8" @else class="column is-12" @endif>
    <div class="card">
        <div class="">
            <table class="table is-striped is-fullwidth">
                <tr>
                    <th>{{ __('Medal') }}</th>
                    <th>{{ __('Quantity') }}</th>
                </tr>

                @foreach($order->orderLines as $line)
                    <tr>
                        <td>{{ $line->ticket->name }}</td>
                        <td>{{ $line->quantity}}</td>
                    </tr>
                @endforeach

                @if($order->isGroup())
                    <tr>
                        <td> {{ __('Group price') }} </td>
                        <td> 1 </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</div>
