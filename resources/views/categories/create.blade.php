@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nova Categoria</h3>

    {{-- @include('errors._check') --}}

    {!! Form::open(['route'=>'categories.store']) !!}

    @include('categories._form')

    {!! Html::openFormGroup() !!}
    	{!! Button::primary('Criar categoria')->submit() !!}
    	{!! Form::submit('Criar categoria', ['class'=>'btn btn-primary']) !!}
    {!! Html::closeFormGroup() !!}

    {!! Form::close() !!}

</div>
@endsection
