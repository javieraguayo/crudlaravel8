

@extends('notes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Laravel 8 CRUD Notas</h3>
            </div>
            <div class="pull-right p-4">
                <a class="btn btn-success" href="{{ route('notes.create') }}"> Crear Nueva Nota</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Detalles</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($notes as $note)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $note->name }}</td>
            <td>{{ $note->detail }}</td>
            <td>
                <form action="{{ route('notes.destroy',$note->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('notes.show',$note->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('notes.edit',$note->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $notes->links() !!}
      
@endsection