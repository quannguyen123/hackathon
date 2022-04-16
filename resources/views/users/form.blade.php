@extends('master')

@section('page-title', !empty($user) ? __('Edit user: :name', ['name' => $user->name]) : __('Create User'))

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
                <li class="breadcrumb-item"><a href="{{route("users.dashboard")}}">{{_('Home') }}</a></li>
                <li class="breadcrumb-item active">{{_('List users')}}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form class="card" action="{{ empty($user) ? route('users.store', ['route_name' => request('route_name')]) : route('users.update', ['user' => $user->id, 'route_name' => request('route_name')]) }}" method="post">
                    @csrf
                    @if (!empty($user)) @method('PUT') @endif

                    <div class="card-header">
                        <h3 class="card-title">
                            {{ !empty($user) ? __('Edit user: :name', ['name' => $user->name]) : __('Create User') }}
                        </h3>

                        <div class="card-tools">
                            <a href="{{ route(request('route_name', 'users') . '.index') }}" class="btn btn-primary btn-sm">
                                {{ __('List users') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?: (!empty($user) ? $user->name : '') }}"
                                        required
                                    />

                                    @error('name')
                                    <span class="error invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Phone') }}</label>
                                    <input
                                        id="phone_number"
                                        type="text"
                                        name="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ old('phone_number') ?: (!empty($user) ? $user->phone_number : '') }}"
                                    />

                                    @error('phone_number')
                                    <span class="error invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') ?: (!empty($user) ? $user->email : '') }}"
                                        required
                                    />

                                    @error('email')
                                    <span class="error invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roles">{{ __('Roles') }}</label>
                                    <select id="role_id" name="role_id" class="form-control select2bs4 @error('roles') is-invalid @enderror">
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role->id }}"
                                                @if (!empty($user) && ($role->id == $user->role_id))
                                                selected
                                                @elseif ($role->id = old('role_id'))
                                                selected
                                                @endif
                                            >
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="error invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('********') }}"
                                    />

                                    @error('password')
                                    <span class="error invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
    </section>
<!-- /.content -->
</div>
@endsection
