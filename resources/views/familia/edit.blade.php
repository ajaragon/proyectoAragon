
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/familia/'.$familia->id) }}" method="post">
        @csrf
        {{ method_field('PATCH')}} <!--Se envía los datos al controlador para que los actualice-->
        @include('familia.form',['modo'=>'Editar registro'])
    </form>
</div>
@endsection
