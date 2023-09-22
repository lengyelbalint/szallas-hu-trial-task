<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<table class="table table-striped">
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
