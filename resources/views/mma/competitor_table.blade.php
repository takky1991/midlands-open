<h4 class="mma-competitors-title">COMPETITORS</h4>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Age group</th>
                <th>Level</th>
                <th>Weight group</th>
                <th>Club</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event->participants->where('paid', 1) as $participant)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$participant->first_name}}</td>
                    <td>{{$participant->last_name}}</td>
                    <td>{{$participant->age_group}}</td>
                    <td>{{$participant->level}}</td>
                    <td>{{$participant->weight_category}}</td>
                    <td>{{$participant->club_name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>