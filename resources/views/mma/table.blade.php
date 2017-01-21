<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th colspan="3">{{$results[0]->title}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
                <tr>
                    <th scope="row">{{ $result->place }}</th>
                    <td>{{ $result->name_and_surname }}</td>
                    <td>{{ $result->club_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>