<div class="form-group">
    <label class="col-sm-{{ isset($sm) ? $sm[0] : 4 }} col-lg-{{ isset($lg) ? $lg[0] : 2 }} control-label"
           for="{{ $for }}">{{ $name }}</label>
    <div class="col-sm-{{ isset($sm) ? $sm[1] : 8 }} col-lg-{{ isset($lg) ? $lg[1] : 6 }}">
        <select class="form-control enhanced-dropdown" style="width: 100%" id="{{ $for }}" name="{{ $for }}"
                data-values="{{ $data_values or json_encode([]) }}" {!! $multiple or '' !!} data-ajax="1" data-key="{{ $keyAttribute or 'id' }}" data-value="{{ $valueAttribute or 'name' }}" data-url="{{ $url }}" data-tags="{{ $tags }}">
            @foreach(json_decode($data) as $key => $value)
                <option id="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <p class="help-block">{{ $helpText or 'Start typing a value to select it' }}</p>
    </div>
</div>