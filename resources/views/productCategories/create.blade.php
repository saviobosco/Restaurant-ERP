@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        {!! Form::open(['route' => 'productCategories.store']) !!}

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
                                Save Category
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


