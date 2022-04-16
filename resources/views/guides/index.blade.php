@extends('master')
@section('page-title', __('List of guides'))

@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Guides</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route("users.dashboard") }}">{{_('Home') }}</a></li>
              <li class="breadcrumb-item active">{{_('List guides')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('List of guides') }}</h3>
                            <div class="card-tools">
                                @include('partials.cards.search')
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('FileName') }}</th>
                                        <th>{{ __('Projects') }}</th>
                                        <th>{{ __('Role') }}</th>
                                        <th>{{ __('SortNo') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guides as $guide)
                                        <tr>
                                            <td>{{ $guide->id }}</td>
                                            <td>{{ $guide->name }}</td>
                                            <td>{{ $guide->description }}</td>
                                            <td>{{ $guide->filename }}</td>
                                            <td>{{ $guide->project ? $guide->project->name : '' }}</td>
                                            <td>{{ $guide->roles->first() ? $guide->roles->first()->name : '' }}</td>
                                            <td>{{ $guide->sort_no }}</td>
                                            <td>{{ $guide->created_at }}</td>
                                            <td class="cms-action">
                                                <a href="{{ route('guides.edit', ['id' => $guide->id]) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                                                <a href="javascript:" class="btn btn-danger btn-sm" onclick="deleteResource('{{ route('guides.delete', ['id' => $guide->id]) }}', '{{ route('guides.index') }}')">{{ __('Delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($guides->hasPages())
                            <div class="card-footer clearfix">
                                <div class="m-0 float-right">
                                    {{ $guides->appends(['q' => request('q')])->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('guides.create') }}" class="btn btn-success float-right">{{ __('Create') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('scripts')
    @include('partials.cards.delete')
@endpush
