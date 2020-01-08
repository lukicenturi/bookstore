@extends('master')

@section('content')
    <section class="mt-5 history">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">My Books</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lended Books</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Borrowed Books</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    @if(count($books) > 0)

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Genre</th>
                                <th>Description</th>
                                <th>Cover</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book['title'] }}</td>
                                    <td>{{ $book['author'] }}</td>
                                    <td>{{ $book['genre'] }}</td>
                                    <td>{{ $book['description'] }}</td>
                                    <td><img src="{{ asset('books/' . $book['cover']) }}" alt="cover" width="200"></td>
                                    <td>{{ $book['status'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="my-5">
                            <div>You are not lend any book yet</div>
                            <div>
                                <a class="btn btn-warning" href="{{ url('lend') }}">Lend Now</a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    @if(count($lended_books) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Borrowed At</th>
                            <th>Borrower Name</th>
                            <th>Borrower Phone Number</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Cover</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lended_books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book['borrowed_at'] }}</td>
                                <td>{{ $book['borrower']['name'] }}</td>
                                <td>{{ $book['borrower']['phone'] }}</td>
                                <td>{{ $book['title'] }}</td>
                                <td>{{ $book['author'] }}</td>
                                <td>{{ $book['genre'] }}</td>
                                <td>{{ $book['description'] }}</td>
                                <td><img src="{{ asset('books/' . $book['cover']) }}" alt="cover" width="200"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="my-5">
                            <div>You are not lended any book yet</div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    @if(count($borrowed_books) > 0)

                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Borrowed At</th>
                            <th>Lender Name</th>
                            <th>Lender Phone Number</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Cover</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($borrowed_books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book['borrowed_at'] }}</td>
                                <td>{{ $book['lender']['name'] }}</td>
                                <td>{{ $book['lender']['phone'] }}</td>
                                <td>{{ $book['title'] }}</td>
                                <td>{{ $book['author'] }}</td>
                                <td>{{ $book['genre'] }}</td>
                                <td>{{ $book['description'] }}</td>
                                <td><img src="{{ asset('books/' . $book['cover']) }}" alt="cover" width="200"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @else
                        <div class="my-5">
                            <div>You are not borrow any book yet</div>
                            <div>
                                <a class="btn btn-warning" href="{{ url('catalog') }}">Explore Now</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
