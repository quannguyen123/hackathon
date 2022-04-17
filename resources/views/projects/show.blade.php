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
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">


                <h3 class="profile-username text-center">{{ $project['name'] }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <strong><i class="fas fa-book mr-1"></i> Info Project</strong>
                      <p class="text-muted">
                      {{ $project['description'] }}
                      </p>
                      <!-- <hr> -->
                  </li>
                  <li class="list-group-item">
                    <b>Member</b> <a class="float-right">{{ count($project['users']) }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Start date</b> <a class="float-right"><?php echo(date("Y-m-d", strtotime($project['created_at']))); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>End date</b> <a class="float-right"><?php echo(date("Y-m-d", strtotime($project['created_at']))); ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">List Guide</h3>
                </div>
              </div>

              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  @foreach ($project['guides'] as $guide)
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <!-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> -->
                        <!-- <span class="username"> -->
                          <a href="#"><b>{{ $guide['name'] }}</b></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        <!-- </span> -->
                        <p class="">Shared publicly - {{ $guide['created_at'] }}</p>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {{ $guide['description'] }}
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->
                  @endforeach
                  </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection