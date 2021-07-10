<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Algolia Search</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="mb-3 mt-3">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select User
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($users as $user)
                        <a class="dropdown-item" href="/?name={{ $user->name }}&{{ http_build_query(request()->except('name')) }}">{{ $user->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <form action="/" method="GET" class="mt-3">
            @if (request('name'))
                <input type="hidden" name="name" value="{{ request('name') }}">
            @endif
            <div class="mb-3">
                <label for="post" class="form-label">Search Post</label>
                <input type="name" class="form-control" id="post" name="post">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if ($results)
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Post</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                        <td>{{ $result->user->name }}</td>
                        <td>{{ $result->user->email }}</td>
                        <td>{{ $result->post }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center mt-3">No results found. Please try again.</p>
        @endif
    </div>
</body>
</html>