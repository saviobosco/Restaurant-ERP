@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales & Receipts</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <a class="float-right btn btn-primary" href="{{ route('invoices.create') }}">New Receipt</a>
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
                                <th>Receipt Id</th>
                                <th>Customer Name</th>
                                <th>Customer Phone </th>
                                <th>Sub total</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($invoices) && $invoices->isNotEmpty())
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }} </td>
                                        <td>{{ ($invoice->customer) ? $invoice->customer->name : 'N/A' }} </td>
                                        <td>{{ ($invoice->customer) ? $invoice->customer->phone_number : 'N/A' }} </td>
                                        <td>&#8358;{{ $invoice->sub_total }} </td>
                                        <td>&#8358;{{ $invoice->total }} </td>
                                        <td>{{ $invoice->created_at }} </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('invoices.show', $invoice->id) }}"> View </a>
                                            @if(isset($invoice->customer) && $invoice->customer->phone_number)
                                            <a class="btn btn-success btn-sm"
                                               href="whatsapp://send?phone={{$invoice->customer->phone_number}}&text=Here%20is%20your%20invoice%20link%0A{{ route('invoices.generate_pdf', $invoice->id) }}">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                            @endif

<!--                                            <a class="btn btn-success btn-sm" href="{{ route('invoices.generate_pdf', $invoice->id) }}">
                                                <i class="fas fa-file-download"></i>
                                            </a>-->

                                            <a class="btn btn-danger btn-sm" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $invoice->id }}').submit();
                                                   }"
                                            > <i class="fas fa-trash-alt"></i> </a>
                                            <form id="{{ $invoice->id }}" style="display: none" action="{{ route('invoices.delete', $invoice->id) }}" method="POST">
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

                    {{ $invoices->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection
