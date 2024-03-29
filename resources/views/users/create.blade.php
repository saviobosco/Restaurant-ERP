@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrations & Users
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">New User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        {!! Form::open(['route' => 'users.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email Address') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone Number') !!}
                            {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role', 'Role') !!}
                            {!! Form::text('role', null, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary">
                                Save user
                            </button>
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


