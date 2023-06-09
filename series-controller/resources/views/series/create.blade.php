<x-layout title="New Serie">
    <form action="/series/save" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <button type="submit" class="btn btn-primary"> Submit </button>
    </form>
</x-layout>