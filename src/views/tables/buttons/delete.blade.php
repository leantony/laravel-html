@if($pjax)
    <a data-pjax-target="{{ $pjaxTarget }}"
       data-method="DELETE" data-confirm="Are you sure you want to do this?"
       href="{{ $url }}"
       class="data-remote btn btn-xs" data-toggle="tooltip"
       data-title="{{ $title }}">{{ $name }}</a>
@else
    <a data-method="DELETE" data-confirm="Are you sure you want to do this?"
       href="{{ $url }}"
       class="data-remote btn btn-xs" data-toggle="tooltip"
       data-title="{{ $title }}">{{ $name }}</a>
@endif