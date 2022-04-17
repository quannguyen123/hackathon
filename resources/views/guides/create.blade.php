@extends('master')
@section('page-title', __('List of guides'))

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Guides</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route("users.dashboard") }}">{{_('Home') }}</a></li>
                            <li class="breadcrumb-item active">{{_('Create guides')}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('guides.store')}}">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" id="inputName" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Description</label>
                                        <textarea id="inputDescription" class="form-control" rows="4"
                                                  name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputFilename">File name</label>
                                        <input type="text" id="inputFilename" class="form-control" name="filename">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSortNo">Sort no</label>
                                        <input type="text" id="inputSortNo" class="form-control" name="sort_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Project</label>
                                        <select id="inputStatus" class="form-control custom-select" name="project">
                                            <option selected="" disabled="">Select project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Guide Role</label>
                                        <select id="inputStatus" class="form-control custom-select" name="role">
                                            <option selected="" disabled="">Select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create" class="btn btn-success float-right">
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')
    @include('partials.cards.delete')
@endpush
