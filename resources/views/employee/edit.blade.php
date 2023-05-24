
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/employee/'.$employee->id) }}" method="post">
        @csrf
        {{ method_field('PATCH')}} <!--Se envía los datos al controlador para que los actualice-->
        @include('employee.form',['modo'=>'Editar registro'])
    </form>
</div>
@endsection
