<x-layout title="Series">

    <a href="/series/create" class="btn btn-dark mb-4 mt-2">Add new series</a>

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">{{$serie->name}}</li>
        @endforeach
    </ul>
</x-layout>