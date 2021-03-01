@extends('layout.default')
@section('content')

<h1 class="h1">Registered User Menu</h1>
<table class="table table-bordered">
  <tr>
    <th>User ID</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Type</th>
    <th>Action 1</th>
    <th>Action 2</th>
  </tr>

    @foreach ($UserMasterdata as $udata)
    <tr>
    <td>{{ $udata->id }}</td>
    <td>{{ $udata->name }}</td>
    <td>{{ $udata->email }}</td>
    <td>{{ $udata->UserType }}</td>
    <td><a class="btn btn-warning" href='{{ url('/') }}/admin/editadmin/{{$udata->id}}'>Edit</a></td>
    <td><a class="btn btn-warning" onclick="return confirm('Are you sure?')" href="{{ url('/') }}/admin/deleteuser/{{$udata->id}}">Delete</a></td>
    </tr>

    @endforeach

</table>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
