<a
    class="button is-small pull-right"
    onclick="window.open('{{ route("order.print.index", $record) }}',
                         'print-{{ $record->id }}',
                         'width=500,height=500');
              return false;">
    <span class="icon is-small">
        <i class="fa fa-print"></i>
    </span>
</a>
