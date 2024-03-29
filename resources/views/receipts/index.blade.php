@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Receipt Lists</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Receipt Number, Customer Name">
                        </div>
                        <div class="col-xs-2">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Receipt Number</th>
                                <th>Created At</th>
                                <th>Customer Mobile </th>
                                <th>Fulfillment</th>
                                <th>Payment Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($receipts) && $receipts->isNotEmpty())
                                @foreach($receipts as $receipt)
                                    <tr>
                                        <td>{{ $receipt->serial_number }}-{{$receipt->id}} </td>
                                        <td>{{ $receipt->created_at }}</td>
                                        <td></td>
                                        <td>fulfilled</td>
                                        <td>paid</td>
                                        <td>{{ $receipt->total }}</td>
                                        <td>
{{--                                            <a class="btn btn-info btn-sm" href="{{ route('invoices.show', $receipt->id) }}"> View </a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

{{--                    {{ $i->links() }}--}}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
