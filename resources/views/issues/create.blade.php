@extends('master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('issues.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                             </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="name">
                                    {{ __('message.title') }}<span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="email" 
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title" 
                                    value="{{ old('email', isset($issue) ? $issue->title : '') }}">
                                @error('title')
                                <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('message.description') }}</label>
                                <textarea 
                                    id="description" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    rows="4"
                                    name="description"
                                    value="{{ old('description', isset($issue) ? $issue->description : '') }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="project">{{ __('message.project') }}</label>
                                <select id="project" class="form-control custom-select" name="project_id">
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
