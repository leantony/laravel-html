@if($modal)
    <a href="{{ $url }}"
       class="btn btn-xs skipPjax show_modal_form"
       data-toggle="tooltip" data-title="{{ $title }}">
        <i class="fa fa-edit"></i>{{ $name }}</a>
@else
    <a href="{{ $url }}"
       class="btn btn-xs {{ !$pjax ? 'skipPjax' : '' }}"
       data-toggle="tooltip" data-title="{{ $title }}">
        <i class="fa fa-edit"></i>{{ $name }}
    </a>
@endif