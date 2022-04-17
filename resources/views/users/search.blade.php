<div class="card">
    <div class="box ">
        <div class="card-header">
            <div class="btn-group">
                <button class="btn btn-primary btn-sm" id="btn_filter">
                    <i class="fa fa-filter"></i>
                    <span>{{__('Filter')}}</span>
                </button>
            </div>
            <div class="card-tools">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i>
                    {{ __('Create') }}
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="filter-box">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{__('message.user_name')}}</label>
                            <input name="name" value="{{ request('name') }}" class="form-control" placeholder="{{__('Name')}}">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group">
                            <label>{{__('Email')}}</label>
                            <input name="email" value="{{ request('email') }}" class="form-control" placeholder="{{__('Email')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">    
                            <div class="form-group">
                                <label>{{__('Phone')}}</label>
                                <input name="phone_number" value="{{ request('phone_number') }}" class="form-control" placeholder="{{__('Phone number')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{__('Role')}}</label>
                            <select id="role" name="role" class="form-control">
                                <option
                                    value=""
                                >
                                    {{ __('All') }}
                                </option>
                                @foreach($roles as $row)
                                    <option
                                        value="{{ $row->id }}"
                                        @if ($row->id == request('role'))
                                        selected
                                        @endif
                                    >
                                        {{ __($row->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i> {{__('Apply')}} </button>
                <div class="btn btn-default btn-sm pull-left" id="btn_reset">
                    <a href="{{ url()->current() }}"><i class="fa fa-undo"> {{__('Reset')}}</i></a>
                </div>
            </div>
        </form>
    </div>
</div>

@include('partials.js.filter')
