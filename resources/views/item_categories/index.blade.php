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
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('item_categories.create') }}">
                            <i class="fa fa-plus"></i>
                            Add
                        </a>
                        <h5 class="box-title">Items Categories Table</h5>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Input Type</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($item_categories) && $item_categories->isNotEmpty())
                                @foreach($item_categories as $item_category)
                                    <tr>
                                        <td>{{ $item_category->name }} </td>
                                        <td>{{ $item_category->type }} </td>
                                        <td>
                                            <a href="{{ route('item_categories.edit', $item_category->id) }}"> Edit </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $item_category->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $item_category->id }}" style="display: none" action="{{ route('item_categories.delete', $item_category->id) }}" method="POST">
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
