{{-- Extends layout --}}
@extends('layout.default')
@section('content')
<div class="container">
  <p class="display-1 py-3">Total vehicles in Warehouse:{{ $totalVehicle }}</p>
  <p class="display-1 py-3">Vehicles Docked IN in Warehouse: {{ $dockVehicle }} </p>
  <p class="h2 py-3">Loading: {{ $loading }} </p>
  <p class="h2 py-3">Unloading: {{ $unloading }} </p>
</div>
<a href='{{ url('/') }}/print'>Print</a>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
