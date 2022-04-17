@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project {{ isset($project) ? 'Edit' : 'Add' }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project {{ isset($project) ? 'Edit' : 'Add' }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
  <!-- @if ($errors->any())
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif -->
    <form action="{{ isset($project) ? route('projects.update', $project['id']) : route('projects.store') }}" method="post">
      @csrf
      @if (!empty($project)) @method('PUT') @endif
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Project Info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" id="inputName" name="name" value="{{ old('name', isset($project) ? $project['name'] : '') }}" class="form-control">
                <code>{{ $errors->first('name') }}</code>
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" name="description" class="form-control" rows="4">{{ old('description', isset($project) ? $project['description'] : '') }}</textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Manager</label>
                <select id="inputStatus" name="manager_id" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  @foreach($managers as $manager)
                  <option value="{{$manager['id']}}" @if(old('manager_id', isset($project) ? $project['manager_id'] : '') == $manager['id']) selected @endif>{{ $manager['name'] }}</option>
                  @endforeach
                </select>
                <code>{{ $errors->first('manager_id') }}</code>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start Date</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" data-inputmask-alias="datetime" name="start_date" value="{{ old('start_date', isset($project) ? $project['start_date'] : '') }}" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                    </div>
                    <code>{{ $errors->first('start_date') }}</code>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-md-6">
                  <label>End Date</label>

                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" data-inputmask-alias="datetime" name="end_date" value="{{ old('end_date', isset($project) ? $project['end_date'] : '') }}" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                    </div>
                    <code>{{ $errors->first('end_date') }}</code>
                    <!-- /.input group -->
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Member</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Member</label>
                <select class="select2" multiple="multiple" name="user_id[]" data-placeholder="Select a State" style="width: 100%;">
                <?php 
                  selectMember($members, old('user_id', isset($projectMembersID) ? $projectMembersID : []));
                ?>
                  
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="{{ isset($project) ? 'Edit Project' : 'Create new Project' }}" class="btn btn-primary float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection