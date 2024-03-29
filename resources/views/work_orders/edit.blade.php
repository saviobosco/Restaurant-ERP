@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Edit Work Order
                    </div>

                    <div class="card-body">
                        {!! Form::model($workOrder, ['route' => ['work_orders.update', $workOrder->id ]]) !!}


                        <div class="form-group">
                            {!! Form::label('customer_id', 'Customer *') !!}
                            {!! Form::select('customer_id', $customers,
                            null,
                            ['class' => 'form-control', 'disabled' => true]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('customer_vehicle_id', 'Motorcycle Detail *') !!}
                            {!! Form::select('customer_vehicle_id',
                             $motorcycles, null,
                             ['class' => 'form-control', 'disabled' => true]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mileage', 'Mileage') !!}
                            {!! Form::text('mileage', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description (Tasks Performed) *') !!}
                            {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 8]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('service_date', 'Service Date *') !!}
                            {!! Form::date('service_date', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time_spent', 'Time Spent') !!}
                            {!! Form::text('time_spent', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price_charge', 'Price Charge *') !!}
                            {!! Form::text('price_charge', null, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group mt-4">
                            <button class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

