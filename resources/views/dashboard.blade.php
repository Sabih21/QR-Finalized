<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>

        .container {
    display: flex;
    flex-wrap: wrap; 
    justify-content: center; 
    width: 80%;
    margin-top: 30px;
    margin-left: auto; /* Center the container horizontally */
    margin-right: auto; /* Center the container horizontally */
}


        .button {

            background-color: transparent;
            border: 1px solid #000000;
            color: black;
            border-radius: 5px;
            padding: 50px 30px;
            font-size: 24px;
            margin: 10px;
            flex: 1 1 calc(25% - 40px);
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            text-align: center;
        }

        .button i {
            font-size: 32px; /* Increased icon size */
            margin-bottom: 10px; /* Increased margin for better spacing */
        }

        .button:hover {
            background-color: #d3d3d38f; 
            color: black;
            text-decoration: none; 
            transition: background-color 0.5s;

            /* border: 1px solid black; */
        }

        @media (max-width: 768px) {
            .button {
                flex: 1 1 calc(50% - 20px); /* Adjust to fit 2 buttons in a row */
            }
        }

        @media (max-width: 480px) {
            .button {
                flex: 1 1 calc(100% - 20px); /* Stack buttons on small screens */
            }
        }
    </style>

    <div class="container">
        @if(auth()->user()->status == 1)
            <a href="{{ url('properties') }}" class="button">
                <i class="fas fa-building"></i>
                <span>Properties</span>
                <span>{{$total_properties}}</span>
            </a>

            <a href="{{ url('resident') }}" class="button">
                <i class="fas fa-users"></i>
                <span>Residents</span>
                <span>{{ auth()->user()->resident->count() }}</span>
            </a>
        @endif

        <a href="{{ url('visitors') }}" class="button">
            <i class="fas fa-user-friends"></i>
            <span>Visitors</span>
            <span>{{$total_visitor}}</span>
        </a>

    </div>
</x-app-layout>
