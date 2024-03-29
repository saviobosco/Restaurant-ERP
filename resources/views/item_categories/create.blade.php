@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Center
        </h1>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Item</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        {!! Form::open(['route' => 'item_categories.store']) !!}

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('type', 'Input Type') !!}
                                    {!! Form::select('type',[
                                        '' => 'Select',
                                        'text'=>'Text',
                                        'number' => 'Number',
                                        'date' => 'Date'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">
                                Save Item Category
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


