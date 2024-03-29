@extends('admin::layouts.master')

@section('page_title')
    Edit Candidate
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Candidate</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::model($candidate, ['route' => ['admin.candidates.update', $candidate->id], 'role' => 'form']) !!}

                        <div class="form-group">
                            <label for="name"> First Name </label>
                            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


@endsection
