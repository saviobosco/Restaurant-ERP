@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default mb-5">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="clearfix">
                        <a class="btn btn-primary" href="javascript:;">Import</a>
                        <a class="btn btn-primary" href="{{ route('products.create') }}">New Product</a>
                    </div>
                    <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Search item name, category">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
<!--
                                <th>Sort</th>
-->
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($products) && $products->isNotEmpty())
                                @foreach($products as $product)
                                    <tr>
                                        <td><p>{{ $product->name }}</p></td>
                                        <td>{{ setting("currency") }} {{ $product->price }}</td>
                                        <td>{{ ($product->category) ? $product->category->name : '' }} </td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}"> Edit </a>
                                            <a href="{{ route('products.view', $product->id) }}"> Add Recipes </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $product->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $product->id }}" style="display: none" action="{{ route('products.delete', $product->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    {{ $products->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
