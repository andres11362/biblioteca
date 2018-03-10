@if(Session::has('success'))
    <div class="alert alert-success">
        <p>
            <h3>{{ Session::get('success') }}</h3>
        </p>
    </div>
    {{--Session::get('message')(para usar un solo mensaje por sesion)--}}
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">
        <p>
           <h3>{{ Session::get('error') }}</h3> 
        </p>
    </div>
@endif