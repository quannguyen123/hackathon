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
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('guides.update', ['project_id' => $project_id])}}">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Project</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputStatus">Project</label>
                                        <select id="inputStatus" class="form-control custom-select" name="project">
                                            <option selected="" disabled="">Select project</option>
                                            @foreach($projects as $project)
                                            <option value="{{ $project->id }}" @if($project->id == $project_id) selected @endif>{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Guide Role</label>
                                        <select id="inputStatus" class="form-control custom-select" name="role">
                                            <option selected="" disabled="">Select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if($role->id == $guides->first()->roles->first()->id) selected @endif>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Guide</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($guides as $guide)
                                    <div class="parent-guide post">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" id="inputName" class="form-control" name="name[]" value="{{ $guide->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <textarea id="inputDescription" class="form-control" rows="4"
                                                      name="description[]">{{ $guide->description }}</textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="guide_id[]" class="guide_id" value="{{ $guide->id }}">
                                    @endforeach
                                    <div class="form-group">
                                        <input type="button" value="Add Guide" id="add-guide" class="btn btn-primary float-right">
                                        <input type="button" value="Remove" id="remove-guide" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Update" class="btn btn-success float-right">
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
@push('scripts')
    <script>
        $(function(){
            $("#add-guide").click(function(){
                $(".parent-guide:last").clone().insertAfter(".parent-guide:last");
                $(".parent-guide:last").find("input:text").val("");
                $(".parent-guide:last").find('textarea').val("");
            });
            $("#remove-guide").click(function(){
                $(".parent-guide:last").remove();
            });
        });
    </script>
@endpush
