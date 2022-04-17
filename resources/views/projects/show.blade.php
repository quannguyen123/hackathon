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


                <h3 class="profile-username text-center">{{ $project->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <strong><i class="fas fa-book mr-1"></i> Info Project</strong>
                      <p class="text-muted">
                      {{ $project->description }}
                      </p>
                      <!-- <hr> -->
                  </li>
                  <li class="list-group-item">
                    <b>Member</b> <a class="float-right">{{count($project->users)}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Start date</b> <a class="float-right">{{$project->start_date}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>End date</b> <a class="float-right">{{$project->end_date}}</a>
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
                  <h3 class="card-title">Hướng dẫn các bước thực hiện dự án: {{$project->name}}</h3>
                </div>
              </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  @foreach ($project->guides as $guide)
                  @php 
                  $guideMember = $guideMembers->where('pivot.guide_id',$guide->id)->first();
                  @endphp 
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <!-- <span class="username"> -->
                          <a><b>{{ $guide->name }}</b></a>
                        <!-- </span> -->
                        <p class="">Ngày tạo - {{ $guide->created_at}}</p>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {!! $guide->description !!}
                      </p>

                      <p>
                        <div class="form-group clearfix margin-bottom-10 cms-action">
                            <div class="icheck-primary d-inline">
                                <input class="quick-update" data-type="status" type="checkbox" data-id="{{ $guide->id }}" data-project-id="{{ $project->id }}" id="status_{{ $guide->id }}" @if ($guideMember && $guideMember->pivot->status) checked @endif>
                                <label for="status_{{ $guide->id }}">{{ __('Trạng thái') }}</label>
                            </div>
                        </div>
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Lý do không thực hiện được" value="{{ ($guideMember)? $guideMember->pivot->description:'' }}" id="description_{{ $guide->id }}">
                          <div class="input-group-append">
                            <button type="button" class="btn btn-danger quick-submit" data-id="{{ $guide->id }}" data-project-id="{{ $project->id }}" data-type="description" >Send</button>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.quick-update').change(function() {
                var type = $(this).data('type');
                var guide_id = $(this).data('id');
                var project_id = $(this).data('project-id');

                if (type == 'status') {
                    var value = $(this).is(':checked') ? 1 : 0;
                } else {
                    var value = $(this).val();
                }
                $.ajax({
                    url: "{{ route('projects.quick_update') }}",
                    type: "POST",
                    data: ({
                        type: type,
                        value: value,
                        guide_id: guide_id,
                        project_id: project_id,
                    }),
                    success: function(data) {
                        if (data.status == 1) {
                            Toast.fire({
                                type: 'success',
                                title: '{{ __('Update data successfully.') }}'
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: '{{ __('Update error data.') }}'
                            });
                        }
                        removeOverlay();
                    }
                });
            });

            $('.quick-submit').click(function() {
                var type = $(this).data('type');
                var guide_id = $(this).data('id');
                var project_id = $(this).data('project-id');
                var value = $('#description_'+guide_id).val();
                $.ajax({
                    url: "{{ route('projects.quick_update') }}",
                    type: "POST",
                    data: ({
                        type: type,
                        value: value,
                        guide_id: guide_id,
                        project_id: project_id,
                    }),
                    success: function(data) {
                        if (data.status == 1) {
                            Toast.fire({
                                type: 'success',
                                title: '{{ __('Update data successfully.') }}'
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: '{{ __('Update error data.') }}'
                            });
                        }
                        removeOverlay();
                    }
                });
            });
        });
    </script>

@endpush