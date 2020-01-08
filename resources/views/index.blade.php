<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet-0.7.2/leaflet.css">
    <script src="https://d19vzq90twjlae.cloudfront.net/leaflet-0.7.2/leaflet.js"></script>
    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Book Store</title>
</head>

<body>
    <div id="mapid"></div>
    <div class="map-search">
        <form action="{{ url('/') }}" method="GET">
            <div class="d-flex">
                <input type="search" class="form-control" id="search_book" placeholder="Search Book" name="search" value="{{ request('search') }}">
                <button class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    <div class="mode">
        <a href="{{ url('catalog') }}" class="btn btn-primary">
            Go To Catalog
        </a>
    </div>
    <script>
        let initial = <?php echo json_encode($initial); ?>;
        let books = <?php echo json_encode($books); ?>;
        let map = L.map('mapid').setView(initial, 12);

        let api = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibHVraWNlbnR1cmkiLCJhIjoiY2swMXk0aGpvMmQzMTNtcGZiN2Z2dDdodyJ9.QRfsh3lC3DAc2WqUxzXmVw';

        L.tileLayer(api, {
            maxZoom: 18,
            id: 'mapbox.streets'
        }).addTo(map);

        let searchControl = new L.esri.Controls.Geosearch().addTo(map);

        let results = new L.LayerGroup().addTo(map);

        books.forEach((book, key) => {
            let marker = L.marker([book.lender.latitude, book.lender.longitude]).addTo(map);
            let popup = `
                <div style="font-size:1rem">
                    <img width="100" src="{{ asset('books') }}/${book.cover}"></img>
                    <div><b>Title: ${book.title}</b></div>
                    <div><b>Author: ${book.author}</b></div>
                    <div><b>Lender: ${book.lender.name}</b></div>
                    <div><a href="{{ url('book/') }}/${book.id}">Borrow</a>
                </div>
            `;
            marker.bindPopup(popup);
        });
    </script>
</body>
</html>
