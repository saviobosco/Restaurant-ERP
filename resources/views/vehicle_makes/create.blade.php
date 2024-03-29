@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        Add Motorcycle Make
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => 'suppliers.store']) !!}
                        <div class="form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 5]) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
