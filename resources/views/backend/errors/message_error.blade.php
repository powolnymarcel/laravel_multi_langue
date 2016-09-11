@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<ul style="margin:40px 0 0 15px;font-size: 16px;color:darkred;">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>