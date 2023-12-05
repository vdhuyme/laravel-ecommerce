@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('warning') }}</strong>
</div>
@endif

@if(session()->has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('danger') }}</strong>
</div>
@endif