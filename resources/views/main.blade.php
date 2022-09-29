<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Салон красоты</title>
</head>
<body>
    <a href="{{ route('login') }}">Войти</a>
    <a href="{{ route('register') }}">Регистрация</a>
    <a href="{{ route('masters') }}">Мастера</a>
    <a href="{{ route('services') }}">Наши услуги</a>
    <a href="{{ route('posts') }}">Новости</a>
    <a href="{{ route('appointment') }}">Записаться на приём</a>
    @if(Session::has('success'))

        <p class="alert
    {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('success') }}</p>

    @endif
        <h1>Новости</h1>
        @foreach($posts as $post)
            <div class="card" style="width: 27rem; display: inline-flex" >
                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->images) }}" class="card-img-top" alt="{{ $post->name  }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name  }}</h5>
                    <p class="card-text"> {{ mb_substr($post->post, 0, 100) . '...' }}</p>
                    <a href="{{ route('post', $post->id) }}" class="btn btn-primary"> Подробнее...</a>
                </div>
            </div>
        @endforeach
    <h2>Наши мастера</h2>
    @foreach($masters as $master)
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ $master->name }} {{ $master->surname }}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <img width="400px" src="{{  \Illuminate\Support\Facades\Storage::url($master->images) }}" alt="{{ $master->name }}">
                        <br>
                        Номер телефона: {{ $master->phone_number }}
                        <br>
                        Соц. сети: <a href="{{ $master->social_media }}"><img src="data:image/jpeg;base64,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" width="20px" alt="Инстаграмм"></a>
                        <br>
                        Информация: {{ mb_substr($master->information, 0, 50) . '... ' }} <a href="{{ route('masters') }}">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <h2>Галерея</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($images as $image)
            <div class="carousel-item active">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}" class="d-block w-100" alt="{{ $image->description }}">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>
</html>
