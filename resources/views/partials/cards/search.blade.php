@php
    if(!isset($nameInput)) $nameInput= 'q';    
@endphp
<form id="search-form" method="get">
    <div class="input-group input-group-sm" style="width: {{ $width ?? '150px' }};">
        <input
            id="search-value"
            type="text"
            name={{ $nameInput }}
            class="form-control float-right"
            placeholder="{{ $placeHolder ?? __('Search') }}"
            value="{{ request($nameInput) }}"
        >

        <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

            @if (!empty(request($nameInput)))
                <a href="{{ url()->current() }}" class="btn btn-danger"><i class="fas fa-times"></i></a>
            @endif
        </div>
    </div>
</form>