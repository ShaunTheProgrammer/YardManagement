{{-- Extends layout --}}
@extends('layout.default')
@section('content')
<div class="row">
<a href="">Export PDF</a>
    
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
