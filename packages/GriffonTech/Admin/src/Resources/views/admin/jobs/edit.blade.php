@extends('admin::layouts.master')

@section('page_title')
    Edit Job
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Job</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::model($job, ['route' => ['admin.jobs.update', $job->id], 'role' => 'form']) !!}

                        <div class="form-group">
                            <label for="name"> Title </label>
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
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
