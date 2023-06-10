<x-layout title="Edit Series">
    <form action="{{route("series.update",$id)}}" method="POST">
        @csrf
        @method("PATCH")
        <label class="form-label" for="name">Name:</label>
        <input type="text" name="name" class="form-control" id="name">
        <button class="btn btn-success btn-sm">Confirm</button>
    </form>
</x-layout>