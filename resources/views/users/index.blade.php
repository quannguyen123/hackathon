@extends('master')
@section('page-title', __('List of users'))

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
    <div class="row">
        <div class="col-md">
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
                                    <td>{{showRole($user->role_id)}}</td>
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
                    <div class="card-footer clearfix padding-bottom-0">
                        <div class="pagination-sm m-0 float-right">
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