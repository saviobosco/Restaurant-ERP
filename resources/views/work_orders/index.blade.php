@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <a class="float-right" href="{{ route('work_orders.create') }}">Add Work Order</a>
                        Work Orders
                    </div>

                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <select name="" id="" class="form-control">
                                    <option value="">License Plate</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Motorcycle</th>
                                <th>Service Date</th>
                                <th>Price Charge</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($work_orders) && $work_orders->isNotEmpty())
                                @foreach($work_orders as $work_order)
                                    <tr>
                                        <td>{{ $work_order->customer->name }} </td>
                                        <td>{{ $work_order->customer_vehicle->name }} ({{ $work_order->customer_vehicle->license_plate_number }}) </td>
                                        <td>{{ $work_order->service_date }} </td>
                                        <td>{{ $work_order->price_charge }} </td>
                                        <td>
                                            <a href="{{ route('work_orders.edit', $work_order->id) }}"> Edit </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                       alert('Do nothing!');
                                                   //document.getElementById('{{ $work_order->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $work_order->id }}" style="display: none" action="{{ route('work_orders.delete', $work_order->id) }}" method="POST">
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
