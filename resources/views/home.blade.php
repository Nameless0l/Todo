@extends("template") @section("title", "Ma Todo List") @section("content")
<div class="container">
  <div class="card">
    <div class="card-body">
      <!-- Action -->
      <form action="{{route('todo.add')}}" method="POST" class="add">
        @method('DELETE')
        @csrf
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"
            ><span class="oi oi-pencil"></span
          ></span>
          <input
            id="texte"
            name="texte"
            type="text"
            class="form-control"
            placeholder="Prendre une note…"
            aria-label="My new idea"
            aria-describedby="basic-addon1"
          />
        </div>
        <button type="submit" class="btn primary">enregistrer</button>
      </form>
      <!-- Liste -->
      <ul class="list-group">
        @forelse ($todos as $todo)
        <li class="list-group-item">
          <span>{{ $todo->texte }}</span>
          <span>{{ $todo->id }}</span>
          {{-- <a  href="{{ route('todo.done', ['id' => $todo->id]) }}" class="btn btn-success"><i class="fas fa-check"></i></a>
          <form method="POST" action="{{ route('todo.delete', $todo->id) }}">
            @method('DELETE')
            @csrf
           <button type="submit">Supprimer rendez-vous</button>
           </form> --}}

          <a  href="{{ route('todo.done', ['id' => $todo->id]) }}" class="btn btn-success"><i class="fas fa-check"></i></a>
        @if ($todo->termine==1)
            <a href="{{ route('todo.delete', ['id' => $todo->id]) }}"><i class="fas fa-stroopwafel"></i>supprimer</a>
        @endif
          <!-- Action à ajouter pour Terminer et supprimer -->
        </li>
        @empty
        <li class="list-group-item text-center">RAS</li>
        @endforelse
      </ul>
    </div>
  </div>
</div>
@endsection
