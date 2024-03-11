<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <div class="container mx-auto mt-4 text-center">
            @if(session('message'))
                <p class="text-success h3">{{ session('message') }}</p>
            @endif
        </div>
        <section class="container mx-auto row gap-4 pt-4 justify-content-center">
            <div class="container">
                <a href="{{ route('post.create') }}" class="btn btn-success">Create Post</a>
            </div>
            @foreach ($posts as $post)
                <div class="card mt-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                        <a href="{{ route('post.show', $post['id'] ) }}" class="card-link">See more</a>
                        <form action="{{ route('post.destroy', $post['id']) }}" method="post" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Danger</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>