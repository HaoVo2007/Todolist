<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        <div class="row m-1 p-4">
            <div class="col">
                <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                    <u>Edit Todo-s</u>
                </div>
            </div>
        </div>

        <div class="row m-1 p-3">
            <div class="col col-11 mx-auto">
                <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                    <div class="col">
                        <form action="/todos/update/{{$todo->id}}" method="post">
                            @method('PATCH')
                            @csrf
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" value="{{$todo->title}}" type="text" name="title" placeholder="Add new title..">
                            <br>
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" value="{{$todo->description}}" type="text" name="description" placeholder="Add new description ..">
                            <button type="submit" class="btn btn-primary mt-3 p-3 w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>