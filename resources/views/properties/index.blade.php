
<x-app-layout>

    <div class="container">
<div class="card mt-5">
  <h2 class="card-header">Bay Business Edge</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('properties.create') }}" > <i class="fa fa-plus"></i> Add New Property</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Address</th>
                    <th>House no</th>
                    
                
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($properties as $property)
                <tr>
                    <td>{{$property->id}}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->house_no }}</td>
                   
                    <td>
                        <form action="{{ route('properties.destroy',$property->id) }}" method="POST">
             
                        <a class="btn btn-primary btn-sm" href="{{ route('properties.edit',$property->id) }}">
                            <i class="fa-solid fa-edit"></i> Edit</a>


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