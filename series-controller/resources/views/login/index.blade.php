<x-layout title="Login">
    <form method="POST" action="{{route('login.store')}}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>

    <a class="btn btn-primary mt-4" href="{{ route('user.create') }}">Create an Acc</a>

</x-layout>