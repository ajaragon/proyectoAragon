
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
        @csrf
        {{ method_field('PATCH')}} <!--Se envía los datos al controlador para que los actualice-->
        @include('empleado.form',['modo'=>'Editar registro'])
    </form>
</div>
@endsection
