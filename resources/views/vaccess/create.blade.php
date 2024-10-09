<x-app-layout>
    <div class="container">
        <div class="card mt-5">
            <h2 class="card-header">Add New Visitors Access</h2>
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('vaccess.index', ['id' => $_GET['id']]) }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>

                <form action="{{ route('vaccess.store') }}" method="POST">
                    @csrf


                    <input type="hidden" name="visitor_id" value="{{ $vis['id'] }}">


                    <div class="mb-3">
                        <label for="start_time" class="form-label"><strong>Start Time</strong></label>
                        <input id="start_time" name="start_time" type="text" class="form-control datetimepicker" value="">

                        @error('start_time')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_time" class="form-label"><strong>End Time</strong></label>
                        <input id="end_time" name="end_time" type="text" class="form-control datetimepicker" value="">

                        @error('end_time')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Flatpickr CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script>
        // Initialize Flatpickr for both datetime inputs
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#start_time", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
            
            flatpickr("#end_time", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
        });
    </script>
</x-app-layout>
