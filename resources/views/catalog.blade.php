@extends('master')
@section('content')
    <section class="mt-5 catalog">
        <div class="container">
            <h1 class="mb-5">Our Catalog</h1>
            @if(count($books) > 0)
                <div class="row">
                    @foreach($books as $book)
                        <div class="col-3">
                            <img src="{{ url('books/' . $book['cover']) }}">
                            <div class="mt-2">
                                <div class="font-weight-bold mb-2">
                                    Title: {{ $book['title'] }}
                                </div>
                                <a href="{{ url('book/' . $book['id']) }}" class="btn btn-warning">Borrow</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $books->links() }}
                </div>
            @else
                <div>
                    No Book Found :(
                </div>
            @endif
        </div>
    </section>
@endsection
