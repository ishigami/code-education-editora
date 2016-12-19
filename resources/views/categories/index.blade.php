@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Categorias</h3>
        <p>
            {!! Button::withValue('Nova categoria')->asLinkTo(route('categories.create')) !!}
        </p>
    </div>

    <div class="row">
        {{ $categories->links() }}

        {!!
            Table::withContents($categories->items())
            ->striped()
            ->bordered()
            ->callback('Ações', function($field, $category){
                $linkEdit = route('categories.edit', ['category' => $category->id]);
                $linkDestroy = route('categories.destroy', ['category' => $category->id]);
                $deleteID = 'delete-form-' . $category->id;
                $anchorDestroy = Button::withValue('Deletar')->asLinkTo($linkDestroy)->addAttributes([
                    'onclick' => 'event.preventDefault();document.getElementById("'. $deleteID .'").submit();',
                ]);
                $form = Form::open([
                    'route' => ['categories.destroy', 'category' => $category->id],
                    'method' => 'DELETE',
                    'id' => $deleteID
                ]) . Form::close();

                return '
                        <ul class="list-inline">
                            <li>'. Button::withValue('Editar')->asLinkTo($linkEdit) .'</li>
                            <li>'. $anchorDestroy .'</li>
                        </ul>' . $form;
            });
        !!}

        {{ $categories->links() }}
    </div>

</div>
@endsection
