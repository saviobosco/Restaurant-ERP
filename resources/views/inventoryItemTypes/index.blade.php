@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Inventory Item Types</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <a class=" btn btn-primary" href="{{ route('inventoryItemTypes.create') }}">
                             New Inventory Type
                        </a>
                        <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Search">
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
                                @if(isset($itemTypes) && $itemTypes->isNotEmpty())
                                    @foreach($itemTypes as $inventoryItemType)
                                        <tr>
                                            <td>{{ $inventoryItemType->name }} </td>
                                            <td>
                                                <a href="{{ route('inventoryItemTypes.edit', $inventoryItemType->id) }}"> Edit </a>
                                                <a href="#"> View </a>
                                                <a class="text-danger" href="#"
                                                   onclick="event.preventDefault();
                                                       if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                       document.getElementById('{{ $inventoryItemType->id }}').submit();
                                                       }"
                                                > Delete </a>
                                                <form id="{{ $inventoryItemType->id }}" style="display: none"
                                                      action="{{ route('inventoryItemTypes.delete', $inventoryItemType->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6">No Item types Found!</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                        {{ $itemTypes->links() }}
                    </div>
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
