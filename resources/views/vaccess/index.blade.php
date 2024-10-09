
<x-app-layout>

    <div class="container">
<div class="card mt-5">
  <h2 class="card-header">Visitor Access</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end flex-wrap flex-column align-items-end">
            {{-- @dump($visitor->status) --}}
            @if($visitor->status == 2)
                <a class="btn btn-success btn-sm" href="{{ route('vaccess.create', ['id' => $_GET['id']]) }}" > <i class="fa fa-plus"></i> Add New Visitor Access</a>
            @else
                
                <button class="btn btn-success btn-sm btn-disabled" disabled> <i class="fa fa-plus"></i> Add New Visitor Access</button>
                <small class="text-muted" style="font-size:10px">This user has valid active access, try deactivating in order to create a new access (QR) </small>
            @endif
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vaccess as $access)

                <tr>
                    <th> {{ $access->id }} </th>
                    <th> {{ $access->start_time }} </th>
                    <th> {{ $access->end_time }}</th>
                    <th> {!! $access->access !!} </th>
                    <th>
                        <form action="{{ route('vaccess.destroy',$access->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                
                        @if ($access->status == 1)
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-link-slash"></i> Deactivate?</button>
                        @else
                            <button type="submit" class="btn btn-danger btn-sm" disabled>Deactivated</button>
                        @endif
                        
                            </form>    
                    </th>
                </tr>

                @endforeach
            </tbody>

        </table>
        
      
  
  </div>
</div>  

</div>
    

    </x-app-layout>