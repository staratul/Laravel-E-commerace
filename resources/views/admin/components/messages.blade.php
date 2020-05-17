@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger validation-error-messages">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert">x</button>
        </p>
    @endforeach
@endif

@if(session()->has('success'))
    <p class="alert alert-success success-messages mb-3">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">x</button>
    </p>
@endif
