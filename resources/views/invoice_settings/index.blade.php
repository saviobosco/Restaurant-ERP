@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administration
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h6 class="box-title">Invoice Settings</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            {!! Form::open() !!}

                            <div class="form-group">
                                {!! Form::label('tax_percentage', 'Tax Percentage(%)') !!}
                                {!! Form::text('tax_percentage', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('invoice_payment_modes', 'Invoice Payment Modes (separated by commas)') !!}
                                {!! Form::text('invoice_payment_modes', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('invoice_comment', 'Invoice Comment') !!}
                                {!! Form::text('invoice_comment', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Save Settings
                                </button>
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

