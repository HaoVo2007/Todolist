<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .completed h5 {
            text-decoration: line-through;
        }
    </style>

</head>
<body>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        <div class="row m-1 p-4">
            <div class="col">
                <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                    <u>My Todo-s</u>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div id="successAlert" class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <!-- Create todo section -->
        <div class="row m-1 p-3">
            <div class="col col-11 mx-auto">
                <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                    <div class="col">
                        <form action="/todos/store" method="post">
                            @csrf
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" name="title" placeholder="Add new title..">
                            <br>
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" name="description" placeholder="Add new description ..">
                            <button type="submit" class="btn btn-primary mt-3 p-3 w-100">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2 mx-4 border-black-25 border-bottom"></div>
        <!-- View options section -->
      
        <div class="row mx-1 px-5 pb-3 w-80">
            <div class="col mx-auto">
                @foreach($todos as $todo)

                    <div class="row px-3 align-items-center todo-item rounded pt-2">
                        <div class="col px-1 m-1 d-flex align-items-center">
                            <!-- Checkbox -->
                            <input type="checkbox" class="form-check-input" data-todo-id="{{ $todo->id }}">
                            <!-- Tiêu đề công việc -->
                            <div style="margin-left: 20px">
                               <h5>{{$todo->title}}</h5>
                               <p>{{$todo->description}}</p>
                            </div>
                        </div>
                                    
                        <div class="col-auto m-1 p-0 todo-actions">
                            <div class="d-flex">
                                <a style="margin-right: 10px" class="btn btn-primary" href="/todos/edit/{{$todo->id}}">Edit</a>

                                <form action="/todos/delete/{{$todo->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                            <div class="row todo-created-info">
                                <div class="col-auto d-flex align-items-center pr-2">
                                    <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50">{{$todo->created_at}}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alertBox = document.getElementById('successAlert');
        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 1000); // 1000 milliseconds = 1 giây
    });

    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('form-check-input')) {
            var todoItem = event.target.closest('.todo-item');
            if (event.target.checked) {
                todoItem.classList.add('completed');
            } else {
                todoItem.classList.remove('completed');
            }
        }
    });

</script>
</html>