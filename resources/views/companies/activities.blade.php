<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<table class="table table-striped">
    @foreach ($data['companiesActicity'] as $key => $item)
        @if ($key == 0)
            <tr>
                @php $value = json_decode(json_encode($item), true) @endphp
                @foreach ($value as $value_key => $value_value)
                    <td>{{ $value_key }}</td>
                @endforeach
            </tr>
        @endif
        <tr>
            @foreach ($item as $i)
                <td>{{ $i }}</td>
            @endforeach
        </tr>
    @endforeach
</table>
