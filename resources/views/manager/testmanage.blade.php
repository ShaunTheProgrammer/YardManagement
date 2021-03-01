<table>
    <tr>
        <th>ID</th>
        <th>Gate IN Date</th>
        <th>Gate IN Time</th>
        <th>Vehicle Number</th>
        <th>Vehicle Type</th>
        <th>Driver Name</th>
        <th>Activity Type</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->idgateentry }}</td>
        <td>{{ $student->gateindate }}</td>
        <td>{{ $student->gateintime }}</td>
        <td>{{ $student->vehiclenumber }}</td>
        <td>{{ $student->vehicletype }}</td>
        <td>{{ $student->drivername }}</td>
        <td>{{ $student->activitytype }}</td>
        <td>{{ $student->status }}</td>
    </tr>
    @endforeach
</table>
