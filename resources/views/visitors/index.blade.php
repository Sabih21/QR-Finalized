
<x-app-layout>
    <div class="container">
<div class="card mt-5">
  <h2 class="card-header">Bay Business Edge</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('visitors.create') }}" > <i class="fa fa-plus"></i> Add New Visitor</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    {{-- <th>Qr Code</th> --}}
                
                    <th width="250px">Action</th>
                </tr>
            </thead>
eb
            <tbody>
            @forelse ($visitors as $visitor)
                <tr>
                    <td>{{$visitor->id}}</td>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->phone_number }}</td>
                    {{-- <td>{{ $visitor->qr_code }}</td> --}}
                    <td>
                        <form action="{{ route('visitors.destroy',$visitor->id) }}" method="POST">

                        <a class="btn btn-primary btn-sm" href="{{ route('visitors.edit',$visitor->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>


                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            
                            <a class="btn btn-warning btn-sm" href="{{ route('vaccess.index', [ 'id' => $visitor->id]) }}"><i class="fa-solid fa-qrcode"></i> Access </a>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr> 
            @endforelse
            </tbody>
  
        </table>
        
      
  
  </div>
</div>  

</div>
    

    </x-app-layout>