<div class="form-group">
    <label class="col-sm-{{ isset($sm) ? $sm[0] : 4 }} col-lg-{{ isset($lg) ? $lg[0] : 2 }} control-label"
           for="{{ $for }}">{{ $name }}</label>
    <div class="col-sm-{{ isset($sm) ? $sm[1] : 8 }} col-lg-{{ isset($lg) ? $lg[1] : 6 }}">
        <select class="form-control enhanced-dropdown" style="width: {{ $width or '100%' }}" id="{{ $for }}" name="{{ $for }}"
                data-values="{{ $data_values or json_encode([]) }}" {!! $multiple or '' !!}
                data-trigger-target="{{ $triggerTarget or null }}"
                data-trigger-search-key="{{ $triggerSearchKey or 'id' }}"
                data-trigger-search-key="{{ $triggerSearchValue or 'name' }}"
                data-trigger-href="{{ $triggerLink or null }}">
            @foreach(json_decode($data) as $key => $value)
                <option id="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <p class="help-block">{{ $helpText }}</p>
    </div>
</div>