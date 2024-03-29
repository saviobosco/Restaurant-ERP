@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Item Types
        </h1>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Add Item Type</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">


                        {!! Form::model( $inventoryItemType, ['route' => ['inventoryItemTypes.update', $inventoryItemType->id]]) !!}


                        <div class="form-group">
                            <label for="license_plate_number">Name</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
