@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Add Inventory Item </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        {!! Form::open(['route' => 'inventoryItems.store']) !!}

                        <div class="form-group">
                            <label for="code">Code</label>
                            {!! Form::text('code', null, ['class' => 'form-control']) !!}
                        </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                        <div class="form-group">
                            <label for="type_id">Type</label>
                            {!! Form::select(' type_id', $types, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Unit Measurement</label>
                            {!! Form::select(' unit_measurement', $unitMeasurement, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Order Unit</label>
                            {!! Form::number('order_unit', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Unit Cost</label>
                            {!! Form::text('unit_cost', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Portion Unit Measurement</label>
                            {!! Form::select('portion_unit_measurement', $unitMeasurement, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Portion Unit Cost</label>
                            {!! Form::text('portion_unit_cost', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Available Quantity</label>
                            {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save Item</button>
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
