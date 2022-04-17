@extends('master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('message.issues') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ __('message.issues') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12">
                    @foreach($issues as $issue)             
                    <div class="post">
                        <div class="issue-block">
                            <span class="title">
                                <a href="#">{{ $issue->name }}</a>
                            </span>
                            <span class="description">{{ $issue->project ? $issue->project->name : '' }}</span>
                        </div>
                        <p>{{ $issue->description }}</p>
                        <p>
                            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-tool">
                                <i class="fas fa-pen"></i>
                            </a>
                        </p>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
