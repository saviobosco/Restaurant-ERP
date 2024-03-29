@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h6 class="box-title">Edit Product</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            {!! Form::model($product, ['route' => ['products.update', $product->id] ]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::text('price', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('code', 'Code') !!}
                                {!! Form::text('code', null, [
                                'class' => 'form-control',
                                'placeholder'=> 'Product Code (Optional)',
                                'rows' => 5]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id',["" => "--"] + $categories + [
                                "add-category" => "+ Add Category"], null,
                                ['class' => 'form-control', 'id' => 'product-category-id']) !!}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Update Product
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



    <!-- Add Product Category -->
    <div class="modal" id="add-product-category">
        <div class="modal-dialog modal-sm">
            <form id="add-product-category-form" action="#" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input id="category_name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection


@section('footer-script')
@endsection
