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
                <li class="breadcrumb-item active">{{__('message.user.list')}}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">    
        <form action="{{ empty($user) ? route('users.store', ['route_name' => request('route_name')]) : route('users.update', ['user' => $user->id, 'route_name' => request('route_name')]) }}" method="post">
            @csrf
            @if (!empty($user)) @method('PUT') @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('message.user_name') }}</label>
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
                            <div class="form-group">
                                <label for="name">{{ __('message.phone_number') }}</label>
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
                            <div class="form-group">
                                <label for="email">{{ __('message.email') }}</label>
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
                            <div class="form-group">
                                <label for="roles">{{ __('message.role') }}</label>
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
                            <div class="form-group">
                                <label for="password">{{ __('message.password') }}</label>
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
                            <div class="float-left">
                                <a href="{{ route(request('route_name', 'users') . '.index') }}" class="btn btn-secondary">{{ __('message.cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('message.create') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </section>
<!-- /.content -->
</div>
@endsection
