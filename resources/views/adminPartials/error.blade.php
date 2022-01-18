<div class="mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="list-unstyled">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>