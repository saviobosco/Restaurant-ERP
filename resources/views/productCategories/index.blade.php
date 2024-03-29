@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default mb-5">
                <div class="card-header">
                    <h3 class="card-title">Product Categories</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="clearfix">
                        <a class="btn btn-primary" href="javascript:;">Import</a>
                        <a class="btn btn-primary" href="{{ route('productCategories.create') }}">New Product Category</a>
                    </div>
                    <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Search name">
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
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($categories) && $categories->isNotEmpty())
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }} </td>
                                        <td>
                                            <a href="{{ route('productCategories.edit', $category->id) }}"> Edit </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $category->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $category->id }}" style="display: none" action="{{ route('productCategories.delete', $category->id) }}" method="POST">
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



                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
