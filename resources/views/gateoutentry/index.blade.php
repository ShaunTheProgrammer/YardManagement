{{-- Extends layout --}}
@extends('layout.default')

 
 @section('content')
    
    
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
             <th width="280px">Action</th>
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
                    
                     <!-- <a class="btn btn-info" href="{{ route('GateEntry.show',$uData->idgateentry) }}">Show</a> -->
 
  
     
                     <a class="btn btn-primary" href="{{ route('gateoutentry',$uData->idgateentry) }}">Gate-Out</a>
                     <!-- SUPPORT ABOVE VERSION 5.5 -->
                     <!-- {{-- @csrf
                     @method('DELETE') --}} 
                     
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                   
       
                     <button type="submit" class="btn btn-danger">Delete</button> -->
                 </form>
             </td>
         </tr>
         @endforeach
     </table>
     {!! $GateentryData->links() !!}
 @endsection 