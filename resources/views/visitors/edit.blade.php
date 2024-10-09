<x-app-layout>
    <div class="container">
        <div class="card mt-5">
            <h2 class="card-header">Edit Resident</h2>
            <div class="card-body">
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('visitors.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
                
                <form action="{{ route('visitors.update', $visitors->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="inputName" class="form-label"><strong>Name:</strong></label>
                        <input 
                            type="text" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="inputName" 
                            value="{{ old('name', $visitors->name) }}" 
                            placeholder="Name">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="resident_id" class="form-label"><strong>Resident Of:</strong></label>
                        <select class="form-select @error('resident_id') is-invalid @enderror" name="resident_id" id="resident_id">
                            @foreach ($residents as $resident)
                                <option value="{{ $resident->id }}" {{ $resident->id == $visitors->resident_id ? 'selected' : '' }}>
                                    {{ $resident->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('resident_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputemail" class="form-label"><strong>Email:</strong></label>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="inputemail" 
                            value="{{ old('email', $visitors->email) }}" 
                            placeholder="Email">
                        @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label"><strong>Phone:</strong></label>
                        <input 
                            type="text" 
                            name="phone_number" 
                            class="form-control @error('phone_number') is-invalid @enderror" 
                            id="phone_number" 
                            value="{{ old('phone_number', $visitors->phone_number) }}" 
                            placeholder="Phone number">
                        @error('phone_number')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"><strong>Password:</strong></label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            placeholder="Leave blank to keep current password">
                        @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="qr_code" class="form-label"><strong>Qr Code:</strong></label>
                        <input 
                            type="text" 
                            name="qr_code" 
                            class="form-control @error('qr_code') is-invalid @enderror" 
                            id="qr_code" 
                            value="{{ old('qr_code', $visitors->qr_code) }}" 
                            placeholder="Qr Code">
                        @error('qr_code')
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
