@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customers
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h3 class="card-title">View Customer</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td>{{ $customer->company_name }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $customer->email }} </td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $customer->phone_number }} </td>
                            </tr>
                        </table>


                        <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-10">
                                <div>
                                    <h5>Customer Bikes</h5>
                                    <a href="{{ route('bikes.create', ['customer_id' => $customer->id]) }}">Add Bike</a>

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>License number</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Identification Number</th>
                                            <th>Memo</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (isset($customer->bikes) && $customer->bikes->isNotEmpty())
                                            @foreach($customer->bikes as $vehicle)
                                                <tr>
                                                    <td> {{ $vehicle->license_number }} </td>
                                                    <td> {{ $vehicle->make }} </td>
                                                    <td> {{ $vehicle->model }} </td>
                                                    <td> {{ $vehicle->identification_number }} </td>
                                                    <td> {{ $vehicle->memo }} </td>
                                                    <td>
                                                        <a href="{{ route('bikes.edit', $vehicle->id) }}"> Edit </a>
                                                        <a class="text-danger" href="#"
                                                           onclick="event.preventDefault();
                                                               if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                               alert('Do nothing!');
                                                               document.getElementById('{{ $vehicle->id }}').submit();
                                                               }"
                                                        > Delete </a>
                                                        <form id="{{ $vehicle->id }}" style="display: none" action="{{ route('bikes.delete', $vehicle->id) }}" method="POST">
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->


@endsection
