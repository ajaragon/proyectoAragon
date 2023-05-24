
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/livestock_farmer/'.$livestock_farmer->id) }}" method="post">
        @csrf
        {{ method_field('PATCH')}} <!--Se envía los datos al controlador para que los actualice-->
        @include('livestock_farmer.form',['modo'=>'Editar registro'])
    </form>
</div>
@endsection
