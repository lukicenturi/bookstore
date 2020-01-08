@extends('master')
@section('content')
<section class="mt-5 catalog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">{{ __('Lend Book') }}</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ url('lend') }}" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control text-capitalize" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                                <div class="col-md-6">
                                    <input id="author" type="text" class="form-control text-capitalize" name="author">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                                <div class="col-md-6">
                                    <input id="genre" type="text" class="form-control text-capitalize" name="genre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" rows="10" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Cover') }}</label>

                                <div class="col-md-6">
                                    <input type="file" id="cover" name="cover" class="form-control" accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Lend Book') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
