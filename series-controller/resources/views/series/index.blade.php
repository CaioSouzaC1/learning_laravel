<x-layout title="Series">

    <a href="/series/create" class="btn btn-dark mb-4 mt-2">Add new series</a>

    @isset($success_msg)
    <div class="alert alert-success">
        {{$success_msg}}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{route('seasons.index',$serie->id)}}">
                {{$serie->name}}
            </a>
            <div class="d-flex gap-2">
                <form action="{{route('series.destroy',$serie->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
                <a href="/series/edit/{{$serie->id}}" class="btn btn-danger btn-sm">Edit</a>
            </div>
        </li>
        @endforeach
    </ul>
</x-layout>