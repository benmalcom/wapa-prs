@if(count($errors) > 0)
    <div class="alert alert-danger app-info edge-r simplebox col-md-4 edge fade in m-5">
        <strong>Whoops!!!</strong> There was some problem with your input
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif