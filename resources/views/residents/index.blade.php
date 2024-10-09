
<x-app-layout>

    <div class="container">
<div class="card mt-5">
  <h2 class="card-header">Bay Business Edge</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('resident.create') }}" > <i class="fa fa-plus"></i> Add New Resident</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Qr Code</th>
                
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($residents as $resident)
                <tr>
                    <td>{{$resident->id}}</td>
                    <td>{{ $resident->name }}</td>
                    <td>{{ $resident->email }}</td>
                    <td>{{ $resident->phone_number }}</td>
                    <td>{{ $resident->qr_code }}</td>
                    <td>
                        <form action="{{ route('resident.destroy',$resident->id) }}" method="POST">
             
                        <a class="btn btn-primary btn-sm" href="{{ route('resident.edit',$resident->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
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