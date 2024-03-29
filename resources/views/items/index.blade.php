@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventory</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default mb-5">
                <div class="card-header">
                    <h3 class="card-title">Items Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="clearfix">
                        <a class="btn btn-primary float-right" href="{{ route('items.create') }}">Add New Item</a>
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
                                <th>Category</th>
                                <th>Name</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($items) && $items->isNotEmpty())
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->category->name }} </td>
                                        <td>
                                            <p>{{ $item->name }}</p>
                                        </td>
                                        <td>&#8358; {{ $item->cost_price }}</td>
                                        <td>&#8358; {{ $item->sell_price }}</td>
                                        <td>
                                            <a href="{{ route('items.edit', $item->id) }}"> Edit </a>
                                            <a href="#"> View </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $item->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $item->id }}" style="display: none" action="{{ route('items.delete', $item->id) }}" method="POST">
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

                    {{ $items->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
