@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        Edit Supplier Details
                    </div>
                    <div class="card-body">

                        {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id]]) !!}
                        <div class="form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 5]) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
