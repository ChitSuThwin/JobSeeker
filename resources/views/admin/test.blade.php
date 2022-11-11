<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Testing</h1>
    @php
       if(session()->has('msg')){
            echo session()->get('msg');
        }else{
            echo "no";
        }  
    @endphp
    <a href="{{ url('admin/test') }}">Go and create session</a>
</body>
</html>