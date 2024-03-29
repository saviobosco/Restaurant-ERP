@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Receipts</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="clearfix">
                        <div class="float-right mb-3">
                            @if(isset($invoice->customer) && $invoice->customer->phone_number)
                                <a class="btn btn-success"
                                   href="whatsapp://send?phone={{$invoice->customer->phone_number}}&text=Here%20is%20your%20invoice%20link%0A{{ route('invoices.generate_pdf', $invoice->id) }}">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif
                            <a title="Share via e-mail" href=""><i class="btn btn-default fas fa-envelope"></i> </a>
                            <a title="download file"  class="btn btn-default" href="{{ route('invoices.generate_pdf', $invoice->id) }}"><i class="fas fa-file-download"></i> </a>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center mb-3">
                                    {{ config("app.name") }}
                                </h2>
                                <hr>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ ($invoice->customer) ? $invoice->customer->name : 'N/A' }}</strong><br>
                                    Telephone: {{ ($invoice->customer) ? $invoice->customer->phone_number : 'N/A' }}<br>
                                    Email: {{ ($invoice->customer) ? $invoice->customer->email : 'N/A' }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Receipt# {{ $invoice->id }}</b><br>
                                <p><b>Date:</b> Date: {{ $invoice->created_at->format('d M Y H:m A') }} </p>
                                <br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoice->invoice_items as $item)
                                        <tr>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>&#8358; {{ number_format($item->price, 2) }}</td>
                                            <td>&#8358; {{ number_format($item->total, 2) }}</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-sm-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>&#8358; {{ number_format($invoice->sub_total, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax:</th>
                                            <td>&#8358; {{ number_format($invoice->tax, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount:</th>
                                            <td>&#8358; {{ number_format($invoice->discount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>&#8358; {{ number_format($invoice->total, 2) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
