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
            <div class="col-md-6 col-xs-12">
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h3 class="card-title">Edit Customer</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        {!! Form::model($customer, ['route' => ['customers.update', $customer->id]]) !!}

                        <div class="form-group required">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="memo">Memo</label>
                            {!! Form::textarea('memo', null, ['class' => 'form-control', 'rows'=>'2']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update customer detail</button>
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
