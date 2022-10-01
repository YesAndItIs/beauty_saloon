<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Мастера</title>
</head>
<body>
<h1>Услуги</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Услуга</th>
        <th scope="col">Цена</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <th scope="row">{{ $service->id }}</th>
            <td>{{ $service->service }}</td>
            <td>{{ $service->price }}</td>
            <td>
                <div class="btn-group" role="group">
                    <form action="{{ route('services_admin.destroy', $service) }}" method="POST">
                        <a class="btn btn-warning" type="button" href="{{ route('services_admin.edit', $service) }}">Редактировать</a>
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Удалить"></form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-success" type="button" href="{{ route('services_admin.create') }}">Добавить услугу</a>
</body>
</html>
