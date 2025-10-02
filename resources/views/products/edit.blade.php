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
                            {{ html()->modelForm($product)->route('products.update', $product->id)->open() }}
                            <div class="form-group">
                                {{ html()->label('name', 'Name') }}
                                {{ html()->text('name')->attribute('class', 'form-control') }}
                            </div>

                            <div class="form-group">
                                {{ html()->label('price', 'Price') }}
                                {{ html()->number('price')->attribute('class', 'form-control') }}
                            </div>

                            <div class="form-group">
                                {{ html()->label('code', 'Code') }}
                                {{ html()->text('code')->attributes([
                                'class' => 'form-control',
                                'placeholder'=> 'Product Code (Optional)',
                                'rows' => 5]) }}
                            </div>

                            <div class="form-group">
                                {{ html()->label('category_id', 'Category') }}
                                {{ html()->select('category_id', ["" => "--"] + $categories)
                                ->attributes(['class' => 'form-control', 'id' => 'product-category-id']) }}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Update Product
                                </button>
                            </div>
                            {{ html()->form()->close() }}
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
