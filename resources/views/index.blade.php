@extends('app.nav')

@section('title', 'Главная')

@section('head')
<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }
    .content {
        text-align: justify;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
    }
</style> 
@endsection

@section('body')
<div class="container">
    <h2 style="text-align: center;">Привет, мир!</h2>
    {{-- слайдеррвырарывоарыоврагывиагцуунирагнцивагынрвиагныуиапгырвиаылв --}}
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://phantom-marca.unidadeditorial.es/b31ecfc79054c6477c9711b3eec2efff/resize/1200/f/jpg/assets/multimedia/imagenes/2023/08/29/16933306923590.jpg" class="d-block w-100" alt="Python" title="Это Python, а ты aboba.">
          </div>
          <div class="carousel-item">
            <img src="https://cdn.pvs-studio.com/import/docx/blog/1026_TIOBE_2022_ru/image1.png" class="d-block w-100" alt="Что-то" title="Хз что это такое.">
          </div>
          <div class="carousel-item">
            <img src="https://www.matecdev.com/img/Fortran_code_logo.png" class="d-block w-100" alt="Fortran" title="Это фортран.">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <div class="content">
        <p>Добро пожаловать на наш сайт, посвященный продаже различных скриптов. Здесь вы найдете широкий ассортимент скриптов для автоматизации ваших задач, улучшения работы сайтов и многого другого. Мы предлагаем скрипты для самых разных нужд, включая:</p>
        <ul>
            <li>Скрипты для электронной коммерции</li>
            <li>Скрипты для аналитики и сбора данных</li>
            <li>Скрипты для автоматизации социальных сетей</li>
            <li>И многие другие</li>
        </ul>
        <p>Все наши скрипты тщательно проверены и поддерживаются нашей командой. Если у вас есть вопросы или нужна помощь в выборе, не стесняйтесь обращаться к нам.</p>
    </div>
</div>
@endsection
