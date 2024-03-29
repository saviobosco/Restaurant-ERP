@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h6 class="box-title">Edit Recipe</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            {!! Form::model($recipe, ['route' => ['recipes.update', $recipe->id] ]) !!}

                            <div class="form-group">
                                {!! Form::label('inventory_item_id', 'Inventory Item') !!}
                                {!! Form::text('inventory_item',
                                    $recipe->item->name."(".$recipe->item->portion_unit_measurement.")" ,
                                    ['class' => 'form-control', 'disabled'=> true]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('portion_used', 'Portion Used') !!}
                                {!! Form::text('portion_used', null, ['class' => 'form-control']) !!}
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Update Recipe
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


@section('footer-script')
@endsection
