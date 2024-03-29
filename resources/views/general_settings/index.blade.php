@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Settings
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Settings</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open() !!}

                        <div class="form-group required">
                            {!! Form::label('business_name', 'Business Name') !!}
                            {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_email', 'Company Email') !!}
                            {!! Form::text('company_email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tax_percentage', 'Tax Percentage') !!}
                            {!! Form::text('tax_percentage', null, ['class' => 'form-control']) !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                Update Settings
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

