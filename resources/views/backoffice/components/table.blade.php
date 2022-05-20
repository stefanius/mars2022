<div>
    <div class="card">
        <div class="card-content">
            <div class="content">
                <div class="w-full">
                    @if($showHeader)
                        <div class="columns">
                            <div class="column is-6">
                                <div class="control">
                                    <input wire:model.debounce.500ms="query" wire:keyUp="resetPage()" type="text" placeholder="{{ __('Search') }}" class="input is-small" style="width: 100%">
                                </div>
                            </div>

                            <div class="column is-5">
                                <!-- placeholder-->
                            </div>

                            <div class="column is-1">
                                @if($showCreateButton)
                                    <a href="{{ route("{$routeKey}.create") }}" class="button is-primary pull-right"> {{ __('Add') }}</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                        <tr>
                            @foreach($headers as $key => $header)
                                <th class="py-3 px-6 text-left" @if(isset($header['width'])) width="{{ $header['width'] }}" @endif>
                                    @if($header['sortable'])
                                        <span style="cursor: pointer;" wire:click="orderBy('{{$key}}')">
                                    {{ __($header['title']) }}
                                </span>
                                    @else
                                        {{ __($header['title']) }}
                                    @endif
                                </th>
                            @endforeach

                            <th></th>
                        </tr>
                        <tbody>
                            @if($records->count() > 0)
                                @foreach($records as $record)
                                    <tr>
                                        @foreach($headers as $key => $header)
                                            <td class="py-3 px-6 @if(isset($header['align'])) has-text-{{$header['align']}} @endif whitespace-nowrap">{{ $record->$key }}</td>
                                        @endforeach

                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="buttons has-addons">
                                                @if($modal)
                                                    @include($modal, $record)
                                                @endif

                                                @foreach($actions as $action)
                                                    @include($action)
                                                @endforeach

                                                <a href="{{ route("{$routeKey}.show", $record) }}" class="button is-small is-right is-inline-block">
                                                    <span class="icon is-small">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <tr class="border-b border-gray-200 hover:bg-gray-100 text-center">
                                    <td class="py-3 px-6 text-center whitespace-nowrap" colspan="42"><h1>No Results</h1></td>
                                </tr>

                            @endif
                        </tbody>

                    </table>

                    @if($allowPagination)
                        {{ $records->links() }}
                    @endif
            </div>
            </div>
        </div>
    </div>
</div>
