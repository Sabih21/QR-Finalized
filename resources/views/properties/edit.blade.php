<x-app-layout>
    <div class="container">
        <div class="card mt-5">
            <h2 class="card-header">Edit Property</h2>
            <div class="card-body">
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('properties.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
                
                <form action="{{ route('properties.update', $properties->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Address:</strong></label>
                        <input 
                            type="text" 
                            name="address" 
                            class="form-control @error('address') is-invalid @enderror" 
                            id="address" 
                            value="{{ old('address', $properties->address) }}" 
                            placeholder="Enter address">
                        @error('address')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="house_no" class="form-label"><strong>House No:</strong></label>
                        <input 
                            type="text" 
                            name="house_no" 
                            class="form-control @error('house_no') is-invalid @enderror" 
                            id="house_no" 
                            value="{{ old('house_no', $properties->house_no) }}" 
                            placeholder="Enter house number">
                        @error('house_no')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk"></i> Update
                    </button>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
