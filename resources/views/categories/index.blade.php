@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Center
        </h1>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('categories.create') }}">
                            <i class="fa fa-plus"></i>
                            Add Category
                        </a>
                        <h5 class="box-title">Categories Table</h5>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($categories) && $categories->isNotEmpty())
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }} </td>
                                        <td>{{ $category->description }} </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"> Edit </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $category->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $category->id }}" style="display: none" action="{{ route('categories.delete', $category->id) }}" method="POST">
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
