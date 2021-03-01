@extends('layout.default')
@section('content')

<h1 class="h1">User Menu for Main Gate Security</h1>


@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
