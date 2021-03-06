@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editando categoria: {{$category->name}}</h3>

    {{-- @include('errors._check') --}}

    {!! Form::model($category, [
    	'route' => ['categories.update', 'category' => $category->id],
    	'class' => 'form',
    	'method'=>'PUT',
    ]) !!}

    @include('categories._form')

    {!! Html::openFormGroup() !!}
        {!! Form::submit('Salvar categoria', ['class'=>'btn btn-primary']) !!}
    {!! Html::closeFormGroup() !!}

    {!! Form::close() !!}

</div>
@endsection
