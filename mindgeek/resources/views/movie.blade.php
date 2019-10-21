@extends('layout')

@section('content')
    <!-- Main Info -->
    <div class="container">
        <a href="\" class="btn btn-primary btn-sm mt-1">Back to list</a>
        <h1 class="text-center font-weight-bold">{{ $movieDetails['headline'] }}</h1>
        <h3 class="text-center">({{$movieDetails['year']}})</h3>
        <div class="row">
            <div class="col-12">
                {{ $movieDetails['synopsis'] }}
            </div>
            <div class="col-12 mb-1 mt-3">
                <span class="font-weight-bold mr-3">Director: </span> {{ $movieDetails['directors'][0]['name'] }}
            </div>
            <div class="col-12">
                <span class="font-weight-bold mr-3">Duration: </span>
                {{$duration}}
                <span class="font-weight-bold mr-3 ml-5">Genres: </span>
                @foreach($movieDetails['genres'] as $genre)
                    <span>{{ $genre }},</span>
                @endforeach
                <span class="font-weight-bold mr-3 ml-5">Rating: </span>
                {{ $movieDetails['rating'] }}
            </div>
            <div class="col-12 mb-3">
                <span class="font-weight-bold mr-3">Casting: </span>
                @foreach($movieDetails['cast'] as $cast)
                    <span>{{ $cast['name'] }},</span>
                @endforeach
            </div>
        </div>

        <!-- Image Gallery -->
        <h1 class="font-weight-light text-center text-md-left mt-1 mb-0">Image Gallery</h1>

        <hr class="mt-2 mb-3">

        <div class="row text-center text-lg-left">
            @foreach($movieDetails['keyArtImages'] as $keyImage)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{$keyImage['url']}}" alt="">
                    </a>
                </div>
            @endforeach
            @foreach($movieDetails['cardImages'] as $image)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{$image['url']}}" alt="">
                    </a>
                </div>
            @endforeach
        </div>

        <!--Other Infos -->
        <h1 class="font-weight-light text-center text-md-left mt-1 mb-0">Description</h1>

        <hr class="mt-2 mb-3">

        <div class="row text-center text-lg-left mb-5">
            <div class="col-12">
                {{ $movieDetails['body'] }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $("img").on("error", function () {
                $(this).closest("div").hide();
            });
        </script>
    @endpush

@endsection