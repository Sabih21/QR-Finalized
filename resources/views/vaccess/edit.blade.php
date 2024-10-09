<x-app-layout>
    <div class="container">
        <div class="card mt-5">
            <h2 class="card-header">Edit Visitor Access</h2>
            <div class="card-body">
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('visitors.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
                
                <form action="{{ route('visitors.update', $visitor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="inputName" class="form-label"><strong>Start time</strong></label>
                        <input 
                            type="datetime" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="inputName" 
                            value="{{ old('name', $visitor->name) }}" 
                            placeholder="Name">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputName" class="form-label"><strong>Start time</strong></label>
                        <input 
                            type="datetime" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="inputName" 
                            value="{{ old('name', $visitor->name) }}" 
                            placeholder="Name">
                        @error('name')
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
