<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="/../css/style.css" rel="stylesheet">

</head>

<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">ToDo App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="flex-grow-0 collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">List</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <main class="d-flex justify-content-between my-5">
            <div class="card text-white border-warning bg-warning align-self-start mr-3" style="width: 18rem;">
                <div class="card-body">
                    @php($lista = App\Lista::get()->count())
                    <h1 class="card-title">#{{$lista}}</h1>
                    <p class="card-text">Number of tasks you wrote here on the ToDo app.</p>
                </div>
            </div>

            <div class="card flex-grow-1 ml-3">
                <h5 class="card-header">Write your new task quickly</h5>
                <div class="card-body">
                    <form action="/obaveza/unos" method="post" class="">
                        @csrf
                        <div class="form-group d-flex flex-column">
                            <input type="text" class="form-control mb-2" name="Naslov" required placeholder="Title">
                            <textarea class="form-control mb-2" name="Opis" placeholder="Description of the task"></textarea>
                            <input class="btn btn-primary align-self-end" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <h5 class="mt-5">Your tasks</h5>
        <table class="table table-striped border-0">
            <thead class="thead-dark">
                <th>Title</th>
                <th>Description</th>
                <th></th>
            </thead>
            @php($list = App\Lista::all())
            @foreach ($list as $liste)
            <tr>
                <th>{{$liste['naslov']}}</th>
                <td>{{$liste['opis']}}</td>
                <td align="right"><button class="btn btn-danger">Delete</button></td>
            </tr>
            @endforeach
        </table>

    </div>
</body>

</html>