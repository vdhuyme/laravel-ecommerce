@if(session()->has('success'))
<!-- Success Alert -->
<div class="alert alert-success show" role="alert">
    <strong>{{ session('success') }}</strong>
</div>
@endif

@if(session()->has('warning'))
<!-- Success Alert -->
<div class="alert alert-warning show" role="alert">
    <strong>{{ session('warning') }}</strong>
</div>
@endif

@if(session()->has('danger'))
<!-- Success Alert -->
<div class="alert alert-danger show" role="alert">
    <strong>{{ session('danger') }}</strong>
</div>
@endif