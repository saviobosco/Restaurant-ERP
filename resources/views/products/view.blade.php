@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h6 class="box-title">View Product</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">

                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <td>{{ $product->code }}</td>
                                </tr>

                                <tr>
                                    <th>Category</th>
                                    <td>{{ ($product->type) ? $product->type->name : '' }}</td>
                                </tr>
                            </table>

                            <hr>
                            <h5>Recipes</h5>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Portion Need</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product->recipes as $recipe)
                                    <tr>
                                        <td>{{ $recipe->item->name }}</td>
                                        <td>{{ $recipe->portion_used }} {{ $recipe->item->portion_unit_measurement }} </td>
                                        <td>
                                            <a href="{{ route('recipes.edit', $recipe->id) }}">Edit</a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ?')) {
                                                   document.getElementById('{{ $recipe->id }}').submit();
                                                   }"
                                            > Remove </a>
                                            <form id="{{ $recipe->id }}" style="display: none" action="{{ route('recipes.delete', $recipe->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4">
                                {!! Form::open(['route' => 'recipes.store']) !!}

                                {!! Form::hidden('product_id', $product->id) !!}
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name') !!}
                                            {!! Form::select('inventory_item_id', $items, null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('portion_used', 'Portion Needed') !!}
                                            {!! Form::text('portion_used', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Save Recipes
                                        </button>
                                    </div>

                                </div>
                                {!! Form::close() !!}

                            </div>


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
