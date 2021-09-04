<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    body{
        padding:0;
        margin:0;
        box-sizing: border-box;
        color:#fff;
        font-size:16px;
    }
</style>
<body>
    <div class="todoapp w-50 p-5" style="background-color:rebeccapurple;margin:10% 30%">
    <h1 class="text-center">Todo Application</h1><br/>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{session('status')}}
    </div>
        
    @endif
    <form action="{{route('addtodo')}}" method="post">
        @csrf
        <input type="text" name="todoitem" id="" style="width:70%;height:50px;">
        <input type="submit" class="btn btn-primary" value="Add Todo" style="height: 50px">
    </form>
    @foreach ($todositem as $item)
     <div calss="p-2" style="display:flex">
         <div class="item" style="width: 70%">

            <b>{{$item->todoitem}}</b><br/>
        </div>
        <div class="action d-flex m-2">

            @if ($item->is_completed===0)
                <button  class="btn btn-secondary"><a href="{{route('markcomplete',$item->id)}}">Mark Complete</a></button>
            @else
           
                <button type="button" class="btn btn-secondary">Completed</button>
        @endif
        <form action="{{route('delete',$item->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="ml-2 btn btn-danger" value="Delete">
        </form>
    </div>
     </div>
        
    @endforeach
</body>
</html>