<x-layout title="New Serie">
    <form action="/series/save" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="col-2">
                <label class="form-label" for="seasons">Seasons:</label>
                <input type="text" name="seasons" class="form-control" id="seasons">
            </div>
            <div class="col-2">
                <label class="form-label" for="episodes">Episodes:</label>
                <input type="text" name="episodes" class="form-control" id="episodes">
            </div>
        </div>
        <button type="submit" class="btn btn-primary"> Submit </button>
    </form>
</x-layout>