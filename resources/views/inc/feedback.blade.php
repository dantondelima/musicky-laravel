@if (session('success'))
    <div class="alert alert-success alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
@if (session('finded'))
    <div class="alert alert-danger alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('finded') }}</strong>
    </div>
@endif

{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif --}}
