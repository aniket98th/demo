@if (! is_null($prospects))
    <table border='1'>
        <tr>
            <th>ProspectID</th>
            <th>Parent First Name</th>
            <th>Parent Last Name</th>
            <th>Student First Name</th>
            <th>Student Last Name</th>
            <th>Subjects Interested In</th>
        </tr>
        @foreach($prospects as $prospect)
            <tr>
                <td>{{$prospect->prospectId}}</td>
                <td>{{$prospect->parentFirstName}}</td>
                <td>{{$prospect->parentLastName}}</td>
                <td>{{$prospect->studentFirstName}}</td>
                <td>{{$prospect->studentLastName}}</td>
                <td>{{$prospect->subjectsInterested}}</td>
            </tr>
        @endforeach
    </table>
@endif