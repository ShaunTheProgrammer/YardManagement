{{-- Extends layout --}}
@extends('layout.default')


 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('GateEntry.create') }}"> Create New Gate Entry</a>
             </div>
         </div>
     </div>

     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif

     <table class="table table-bordered">
         <tr>
             <th>#</th>
             <th>Gate in date</th>
             <th>Vehicle Number</th>
             <th>Driver Name</th>
             <th>Status</th>

         </tr>
         @foreach ($GateentryData as $uData)
         <tr>
             <td>{{ ++$i }}</td>
             <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $uData->gateindate)->isoFormat('Do MMM YY') }}</td>
             <td>{{ $uData->vehiclenumber }}</td>
             <td>{{ $uData->drivername }}</td>
             <td>{{ $uData->status }}</td>
             <td>
                 <form action="{{ route('GateEntry.destroy',$uData->idgateentry) }}" method="POST">






                     <!-- SUPPORT ABOVE VERSION 5.5 -->
                     {{-- @csrf
                     @method('DELETE') --}}

                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}



                 </form>
             </td>
         </tr>
         @endforeach
     </table>
     {!! $GateentryData->links() !!}
 @endsection
