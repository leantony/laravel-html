<table class="{{ $tableClasses }}">
    <thead>
    <tr>
        @foreach($rows as $k => $v)

            @if($loop->first)
                @if(!is_array($v))
                    <th class="min-width nowrap">{{ $v }}</th>
                @else
                    @if($sort = array_get($v, 'sort', false))
                        <a href="{{ url($sortUrl) }}">
                            <th class="min-width nowrap">
                                {{ array_get($v, 'label', 'specify label!') }}
                            </th>
                        </a>
                    @else
                        <th class="min-width nowrap">
                            {{ array_get($v, 'label', 'specify label!') }}
                        </th>
                    @endif

                @endif
            @else
                @if(!is_array($v))
                    <th>{{ $v }}</th>
                @else
                    @if($sort = array_get($v, 'sort', false))
                        <a href="{{ url($sortUrl) }}">
                            <th>
                                {{ array_get($v, 'label', 'specify label!') }}
                            </th>
                        </a>
                    @else
                        <th>
                            {{ array_get($v, 'label', 'specify label!') }}
                        </th>
                    @endif
                @endif
            @endif
        @endforeach
        @if($renderButtons)
            <th class="min-width nowrap"></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @if($data->isEmpty())
        @if($warnIfEmpty)
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i>&nbsp;No data present!.</strong>
            </div>
        @endif
    @else
        @foreach($data as $item)
            @include($rowsData, [$dataVarAlias => $item])
        @endforeach
    @endif
    </tbody>
</table>
@if($paginate)
    <div class="center">
        {{ $data->links() }}
    </div><!-- /.center -->
@endif