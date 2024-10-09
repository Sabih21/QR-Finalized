<x-app-layout>
<div class="container">
<div class="card mt-5">
  <h2 class="card-header">Add New Visitors</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('visitors.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('visitors.store') }}" method="POST">
        @csrf
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div class="mb-3">
        <label for="inputName" class="form-label"><strong>Resident OF:</strong></label>
        <br>
        <select class="form-select" name="resident_id" >
        @foreach ($residents as $resident)

        
        <option value="{{$resident->id}}">{{$resident->name}}</option>
        
        @endforeach
    </select>
</div> -->

        <div class="mb-3">
            <label for="inputemail" class="form-label"><strong>Email:</strong></label>
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="inputemail" 
                placeholder="Email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label"><strong>Phone:</strong></label>
            <input 
                type="phone_number" 
                name="phone_number" 
                class="form-control @error('phone_number') is-invalid @enderror" 
                id="phone_number" 
                placeholder="phone number">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  

    
        <div class="mb-3 d-none">
            <label for="qr_code" class="form-label"><strong>Qr Code:</strong></label>
            <input 
                type="text" 
                name="qr_code" 
                class="form-control @error('qr_code') is-invalid @enderror" 
                id="qr_code" 
                value="test"
                placeholder="qr_code">
            @error('qr_code')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
      

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
</div>

</x-app-layout>