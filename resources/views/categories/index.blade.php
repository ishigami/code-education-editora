@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Categorias</h3>
        <p>
            <a href="{{route('categories.create')}}" class="btn btn-default">Nova Categoria</a>
        </p>
    </div>

    <div class="row">
        {{ $categories->links() }}

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <ul>
                            <li><a href="{{ route('categories.edit',['category' => $category->id]) }}" class="btn btn-default btn-sm">Editar</a></li>
                            <li>
                                <?php $deleteForm = "delete-form-{$loop->index}"; ?>
                                <a href="{{ route('categories.edit',['category' => $category->id]) }}" class="btn btn-default btn-sm" onclick="event.preventDefault();document.getElementById('{{ $deleteForm }}').submit();">Excluir</a>
                                {!! Form::open([
                                    'route' => ['categories.destroy', 'category' => $category->id],
                                    'method' => 'DELETE',
                                    'id' => $deleteForm
                                ]) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>

</div>
@endsection
