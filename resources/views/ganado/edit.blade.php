
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/ganado/'.$ganado->id) }}" method="post">
        @csrf
        {{ method_field('PATCH')}} <!--Se envía los datos al controlador para que los actualice-->
        @include('ganado.form',['modo'=>'Editar registro'])
    </form>
</div>
@endsection
