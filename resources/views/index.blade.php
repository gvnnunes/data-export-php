<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <a href="/txt" class="btn btn-info txt">Export to Txt</a>
            <a href="/excel" class="btn btn-success excel">Export to Excel</a>
            <a href="/pdf" class="btn btn-danger pdf" target="_blank">Export to Pdf</a>
            <table class="table table-dark">
                <thead>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created_At</th>
                    <th>Updated_At</th>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->first_name }}</td>
                            <td>{{ $person->last_name }}</td>
                            <td>{{ $person->phone }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ date('d/m/Y', strtotime($person->created_at)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($person->updated_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>   
            </table>
        </div>
    </div>
</body>
</html>