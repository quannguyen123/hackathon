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
        @if (empty($issue))
        <form action="{{ route('issues.store') }}" method="post">
        @else
        <form action="{{ route('issues.update', ['issue' => $issue->id]) }}" method="post">
        @endif
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
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" 
                                    value="{{ old('name', isset($issue) ? $issue->name : '') }}">
                                @error('name')
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
                                @error('description')
                                <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="project">{{ __('message.projects') }}</label>
                                <select id="project" class="form-control custom-select" name="project_id">
                                    @foreach($projects as $project)
                                    @if (!empty($issue) && $issue->project_id == $project->id)
                                    <option value="{{$project->id}}" selected="">{{ $project->name }}</option>
                                    @else
                                        <option value="{{$project->id}}">{{ $project->name }}</option>
                                    @endif
                                        
                                    @endforeach
                                </select>
                                @error('project_id')
                                <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">{{ __('message.issue.security')}}</label>
                                <select class="form-control form-control-light select2" name="private" id="task-priority" required>
                                    <option value="1">{{ __('message.issue.private')}}</option>
                                    <option value="0">{{ __('message.issue.public')}}</option>
                                </select>
                            </div>    
                            <div class="form-group">
                                <a href="{{ route('issues.index') }}" class="btn btn-secondary">{{__('message.cancel') }}</a>
                                <input type="submit" value="{{ __('message.save') }}" class="btn btn-success float-right">
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
