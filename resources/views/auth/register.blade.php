@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading h1 ml-3 my-5">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-12 control-label">Phone Number</label>

                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="position" class="col-md-4 control-label">Position</label>

                            <div class="col-md-12">
                                <input id="position" type="text" class="form-control" name="position" required>
                            </div>
                            <div class="col-md-12">
                                <div id="mapid" style="height: 400px;">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let map = L.map('mapid').setView([-6.21462, 106.84513], 12);
    let api = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibHVraWNlbnR1cmkiLCJhIjoiY2swMXk0aGpvMmQzMTNtcGZiN2Z2dDdodyJ9.QRfsh3lC3DAc2WqUxzXmVw';

    L.tileLayer(api, {
        maxZoom: 18,
        id: 'mapbox.streets'
    }).addTo(map);

    let searchControl = new L.esri.Controls.Geosearch().addTo(map);

    let results = new L.LayerGroup().addTo(map);

    let selected = {
        latitude: -6.21462,
        longitude: 106.84513
    };

    position.value = selected.latitude + ',' + selected.longitude;
    results.addLayer(L.marker([selected.latitude, selected.longitude]));

    searchControl.on('results', function(data){
        if(data.results.length > 0) {
            latlng = data.results[0].latlng;

            selected.latitude = latlng.lat;
            selected.longitude = latlng.lng;

            results.clearLayers();
            results.addLayer(L.marker([selected.latitude, selected.longitude]));
            position.value = selected.latitude + ',' + selected.longitude;
        }
    });

    map.on('click', function(e){
        let coord = e.latlng;
        let lat = coord.lat;
        let lng = coord.lng;

        selected.latitude = lat;
        selected.longitude = lng;

        results.clearLayers();
        results.addLayer(L.marker([selected.latitude, selected.longitude]));
        position.value = selected.latitude + ',' + selected.longitude;
    });
</script>
@endsection
