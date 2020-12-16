<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>
<body>
<!--Container-->
<div class="mx-auto bg-grey-400">
@section('header')
    {{----}}    @include('base.header')
@show

<!--Container-->
    <div class="container">

        <div class="flex flex-1">
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                @yield('content', 'En Attente d\'un contenu')
            </main>
        </div>

        @section('footer')

        @show
    </div>
    {{-- ajoute les scripts javascript pour bootstrap --}}
    @section('scripts')
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/app.js')}}"></script>
@show

</body>
</html>
