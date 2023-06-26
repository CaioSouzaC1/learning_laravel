<x-layout title="Seasons : {!! $series->name !!}">
    <div class="text-center">
    <img style="height: 300px" src="{{asset("storage/" . $series->cover_path)}}" alt="Serie Cover" class="img-fluid">
</div>
    <ul class="list-group">
        @foreach ($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{route('episodes.index', $season->id)}}">
                Season {{$season->number}}
            </a>
            <span class="badge bg-secondary">
                {{$season->watcheds()}} / {{$season->episodes->count()}}
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>