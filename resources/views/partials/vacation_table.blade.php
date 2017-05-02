<table class="table">
    <thead>
        <th>Od</th>
        <th>do</th>
        <th>pocet dni</th>
        <th>stav</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($vacations as $vacation)
        <tr>
            <td>{{$vacation->vacation_from}}</td>
            <td>{{$vacation->vacation_to}}</td>
            <td>{{$vacation->days_of_vacation}}</td>
            <td>{{$vacation->status->description}}</td>
            <td class="row"><a href="">Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
