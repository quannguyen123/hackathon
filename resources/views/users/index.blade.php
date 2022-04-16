@extends('master')
@section('page-title', __('List of users'))

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route("home")}}">{{_('Home') }}</a></li>
                <li class="breadcrumb-item active">{{_('List users')}}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    @include('users.search')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('List of users') }}</h3>
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
                                        <th>{{ __('Phone') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Roles') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{$user->role->name}}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class="cms-action">
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                                                <a href="javascript:" class="btn btn-danger btn-sm" onclick="deleteResource('{{ route('users.destroy', ['user' => $user->id]) }}', '{{ route('users.index') }}')">{{ __('Delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($users->hasPages())
                            <div class="card-footer clearfix">
                                <div class="m-0 float-right">
                                    {{ $users->appends(['q' => request('q')])->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
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