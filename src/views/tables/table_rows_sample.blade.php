<tr>
    <td>{{ $variable->id }}</td>
    <td>{{ $variable->name }}</td>
    <td>$variable->created_at]</td>
    @if($renderButtons)
        <td class="min-width nowrap">
            {!! $viewButton->render(route('variable.view', ['variable' => $variable->id])) !!}
        </td>
        <td class="min-width nowrap">
            {!! $deleteButton->render(route('variable.delete', ['variable' => $variable->id])) !!}
        </td>
    @endif
</tr>