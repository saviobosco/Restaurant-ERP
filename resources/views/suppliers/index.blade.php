@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <a class="float-right" href="{{ route('suppliers.create') }}">Add New Supplier</a>
                        Suppliers
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($suppliers) && $suppliers->isNotEmpty())
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->name }} </td>

                                        <td>
                                            <a href="{{ route('suppliers.edit', $supplier->id) }}">Edit</a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $supplier->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $supplier->id }}" style="display: none" action="{{ route('suppliers.delete', $supplier->id) }}" method="POST">
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
        </div>
    </div>
@endsection
