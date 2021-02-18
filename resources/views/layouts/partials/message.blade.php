@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   <div class="text-center"><strong>Success!</strong>{{ session('success') }}</div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<br>
@endif
@if(session('failure'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed!</strong>{{ session('failure') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<br>
@endif
