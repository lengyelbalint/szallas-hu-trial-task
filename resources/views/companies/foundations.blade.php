<table>
    <thead>
        <tr>
            <td>Date</td>
            <td>Companies</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->selected_date }}</td>
                <td>{{ $value->companies }}</td>
            </tr>
        @endforeach
    </tbody>

</table>
