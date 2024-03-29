@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stock - {{ $stock->id }}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Type</th>
                                <td>{{ $stock->type }}</td>
                            </tr>
                            <tr>
                                <th>Total Items</th>
                                <td>{{ $stock->total_items }}</td>
                            </tr>
                            <tr>
                                <th>Date Created</th>
                                <td>{{ $stock->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Action Performed By</th>
                                <td></td>
                            </tr>
                        </table>

                        <div style="margin-top: 30px;">
                            <h4>Stock Items</h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($stock->stock_items->isNotEmpty())
                                    @foreach($stock->stock_items as $stock_item)
                                        <tr>
                                            <td>{{ $stock_item->name }}</td>
                                            <td>{{ $stock_item->quantity }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
