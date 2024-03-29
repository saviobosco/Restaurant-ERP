@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Partners
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="box-title">Add Partner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'partners.store']) !!}

                        <div class="form-group required">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telephone', 'Telephone') !!}
                            {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', ['supplier' => 'Supplier', 'vendor' => 'Vendor'], null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('memo', 'Memo') !!}
                            {!! Form::textarea('memo', null, ['class' => 'form-control', 'rows' => 5]) !!}
                        </div>

                        <hr>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                Save Partner Detail
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

