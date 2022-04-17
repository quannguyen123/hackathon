@extends('master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dự án</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Dự án</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success hide-alert-message">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Tên dự án
                        </th>
                        <th style="width: 30%">
                            Thành viên
                        </th>
                        <th>
                            Mô tả dự án
                        </th>
                        <th style="width: 8%" class="text-center">
                            Trạng thái
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>
                            {{ $project['id'] }}
                        </td>
                        <td>
                                <a>
                                    {{ $project['name'] }}
                                </a>
                                <br/>
                                <small>
                                    Ngày tạo:  
                                    <code>
                                        <?php echo(date("Y-m-d", strtotime($project['created_at']))); ?>
                                    </code>
                                
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    @foreach($project['users'] as $user)
                                    <a href="#">
                                        <span class="badge badge-{{ $user['id'] == $project['manager_id'] ? 'success' : 'warning' }}">{{ $user['name'] }}</span>
                                    </a>
                                    @endforeach
                                </li>
                                
                            </ul>
                        </td>
                        <td class="project_progress">
                            <div class="">
                                    {{ $project['description'] }}
                            </div>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Success</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('projects.edit', $project['id']) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Sửa
                            </a>
                            <a class="btn btn-danger btn-sm" href="javascript:"  onclick="deleteResource('{{ route('projects.destroy', ['project' => $project['id']]) }}', '{{ route('projects.index') }}')">
                                <i class="fas fa-trash"></i>
                                Xóa
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right pr-4">
                {{ $projects->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('scripts')
    @include('partials.cards.delete')
@endpush