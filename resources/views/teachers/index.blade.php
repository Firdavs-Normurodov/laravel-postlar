<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container table-responsive py-5">
        <table class="table table-bordered ">
            <div class="d-flex justify-content-between  mb-3">
                <h1>Header</h1>
                <a href={{ route('teachers.create') }}><button
                        class="btn btn-primary align-items-center m-0">create</button></a>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">body</th>
                    <th scope="col">image</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Button</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <th scope="row">{{ $teacher->id }}</th>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->body }}</td>
                        <td><img class="rounded-circle" src="./images/{{ $teacher->image }}" width="50px"
                                height="50px" alt="img">
                        </td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->email }}</td>



                        <td class="d-flex justify-content-around">
                            <a href={{ route('teachers.show', $teacher->id) }} class="btn btn-info">view</a>
                            <a href={{ route('teachers.edit', $teacher->id) }} class="btn btn-primary">edit</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure ?')">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</body>

</html>
