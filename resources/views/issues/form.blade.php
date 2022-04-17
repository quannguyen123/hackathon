@extends('master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ empty($issue) ? __('message.issue.create') : __('message.issue.edit') }}</h1>
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
            @if (!empty($issue)) @method('PUT') @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="name">
                                    {{ __('message.issue.title') }}<span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="email" 
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="name" 
                                    value="{{ old('name', isset($issue) ? $issue->name : '') }}">
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
                                        <option value="{{$project->id}}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Priority')}}</label>
                                <select class="form-control form-control-light select2" name="priority" id="task-priority" required>
                                    <option value="Low">{{ __('Low')}}</option>
                                    <option value="Medium">{{ __('Medium')}}</option>
                                    <option value="High">{{ __('High')}}</option>
                                </select>
                            </div>    
                            <div class="form-group">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="{{ __('message.project') }}" class="btn btn-success float-right">
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
