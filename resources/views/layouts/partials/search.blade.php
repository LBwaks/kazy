{{-- <div class="search-box">
    <form action="{{ route('search') }}" class="form-inline d-flex justify-content-center md-form form-sm">
        <input type="search" id="query" name="query" value="{{ request()->input('query') }}" placeholder="Search Here" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
        <i class="fas fa-search"></i>
    </form>
    </div> --}}

    <div class="search-box">
        <form action="{{ route('search') }}" class="form-inline d-flex justify-content-center md-form form-sm">
            @csrf
            <input type="search" id="query" name="query" value="{{ request()->input('query') }}" placeholder="Search Here" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
            <i class="fas fa-search"></i>
        </form>
        </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)
         <li>{{ $error }}</li>

        @endforeach</ul>
    </div>
    @endif
