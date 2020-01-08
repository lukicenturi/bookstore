@extends('master')

@section('content')
<section class="mt-5 book">
    <div class="container">
        <h1 class="mb-4"><i>"{{ $book['title'] }}"</i></h1>
        <div class="row">
            <div class="col-4">
                <img src="{{ url('books/' . $book['cover']) }}" alt="">
            </div>
            <div class="col-8">
                <ul style="padding-left: 20px;">
                    <li>Author: <b> {{ $book['author'] }}</b></li>
                    <li>Genre: <b> {{ $book['genre'] }}</b></li>
                    <li>
                        Lend By: <b>{{ $book['lender']['name'] }}</b>
                        <div id="mapid" style="height: 500px"></div>
                    </li>
                    <li>Description: {{ $book['description'] }}
                </ul>

                <a class="btn btn-warning" href="{{ url('borrow/' . $book['id']) }}"> Borrow This Book</a>
            </div>
        </div>
    </div>
</section>
<script>
    let initial = [{{ $book['lender']['latitude'] }}, {{ $book['lender']['longitude'] }}];
    let map = L.map('mapid').setView(initial, 15);
    let api = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibHVraWNlbnR1cmkiLCJhIjoiY2swMXk0aGpvMmQzMTNtcGZiN2Z2dDdodyJ9.QRfsh3lC3DAc2WqUxzXmVw';

    L.tileLayer(api, {
        maxZoom: 18,
        id: 'mapbox.streets'
    }).addTo(map);

    let results = new L.LayerGroup().addTo(map);
    results.addLayer(L.marker(initial));

</script>
@endsection

