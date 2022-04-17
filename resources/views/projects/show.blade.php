@extends('master')
@section('page-title', __('Project Guides'))
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Guides</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{'users.dashboard'}}">Home</a></li>
            <li class="breadcrumb-item active">Project Guides</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    @foreach ($project->guides as $guide )
        
    @endforeach
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection