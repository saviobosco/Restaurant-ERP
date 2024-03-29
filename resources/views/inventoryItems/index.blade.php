@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Inventory Items</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('inventoryItems.create') }}">
                            Add New
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
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Unit Measure</th>
                                    <th>Order Unit</th>
                                    <th>Portion Unit</th>
                                    <th>Portion Unit Cost</th>
                                    <th>Unit Cost</th>
                                    <th>Quantity</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($items) && $items->isNotEmpty())
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->code }} </td>
                                            <td>{{ $item->name }} </td>
                                            <td>{{ ($item->type) ? $item->type->name : '' }} </td>
                                            <td>{{ $item->unit_measurement }} </td>
                                            <td>{{ $item->order_unit }} </td>
                                            <td>{{ $item->portion_unit_measurement }} </td>
                                            <td>{{ $item->portion_unit_cost }} </td>
                                            <td>{{ $item->unit_cost }} </td>
                                            <td>{{ $item->quantity }} </td>
                                            <td>
                                                <a href="{{ route('inventoryItems.edit', $item->id) }}"> Edit </a>
                                                <a href="#"> View </a>
                                                <a class="text-danger" href="#"
                                                   onclick="event.preventDefault();
                                                       if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                       document.getElementById('{{ $item->id }}').submit();
                                                       }"
                                                > Delete </a>
                                                <form id="{{ $item->id }}" style="display: none"
                                                      action="{{ route('inventoryItemTypes.delete', $item->id) }}"
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

                        {{ $items->links() }}
                    </div>
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
