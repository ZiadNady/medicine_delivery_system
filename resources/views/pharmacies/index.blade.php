{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <h1>Pharmacies</h1>

    <ul>
        @foreach($pharmacies as $pharmacy)
            <li>{{ $pharmacy->name }} - {{ $pharmacy->address }}</li>
        @endforeach
    </ul>
{{-- @endsection --}}
