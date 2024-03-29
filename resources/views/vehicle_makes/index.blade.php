@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <a class="float-right" href="{{ route('vehicle_makes.create') }}">Add New Make</a>
                        Motorcycle Makes
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Model(s)</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($vehicle_makes) && $vehicle_makes->isNotEmpty())
                                @foreach($vehicle_makes as $vehicle_make)
                                    <tr>
                                        <td>{{ $vehicle_make->name }} </td>
                                        <td> {{ $vehicle_make->vehicle_models()->count() }} </td>
                                        <td>
                                            <a href="{{ route('vehicle_makes.edit', $vehicle_make->id) }}">View Models</a>
                                            <a href="{{ route('vehicle_makes.edit', $vehicle_make->id) }}">Edit</a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $vehicle_make->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $vehicle_make->id }}" style="display: none" action="{{ route('vehicle_makes.delete', $vehicle_make->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
