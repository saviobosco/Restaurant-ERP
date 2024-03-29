@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        {!! Form::model($productCategory, ['route' => ['productCategories.update', $productCategory->id] ]) !!}

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">
                                Update Category
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


