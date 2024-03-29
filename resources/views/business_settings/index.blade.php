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
                            <h6 class="box-title">Business Settings</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            {!! Form::open(['route' => 'items.store', 'enctype' => 'multipart/form-data']) !!}

                            <div class="form-group required">
                                {!! Form::label('business_name', 'Business Name') !!}
                                {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group required">
                                {!! Form::label('business_alias', 'Business Alias') !!}
                                {!! Form::text('business_alias', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('business_address', 'Business Address') !!}
                                {!! Form::text('business_address', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('business_email', 'Business Email Address') !!}
                                {!! Form::text('business_email', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('business_telephone', 'Business Telephone') !!}
                                {!! Form::text('business_telephone', null, ['class' => 'form-control']) !!}
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

