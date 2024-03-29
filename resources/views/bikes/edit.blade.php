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
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Bike detail</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        <div style="margin-bottom: 20px;">
                            <a href="{{ route('customers.view', $bike->customer_id) }}">< Return To Customer detail</a>

                        </div>


                        {!! Form::model($bike, ['route' => ['bikes.update', $bike->id]]) !!}

                        <div class="form-group">
                            <label for="license_number">License Number</label>
                            {!! Form::text('license_number', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Bike Make</label>
                            {!! Form::text('make', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Bike Model</label>
                            {!! Form::text('model', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="identification_number">Bike Identification Number</label>
                            {!! Form::text('identification_number', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="memo">Memo</label>
                            {!! Form::textarea('memo', null, ['class' => 'form-control', 'rows'=> '3']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
