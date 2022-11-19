@extends('layouts.main')

@section('head')
<style>
    .card .card-body .card-title {
        height: 40px;
        overflow: hidden;
    }
</style>

@endsection




@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('search') }}" method="GET">
            <div class="row d-flex justify-content-center">
                <input type="text" class="mb-2 col-3 mx-sm-3" required name="term" placeholder="ابحث عن كتاب">
                <button type="submit" class="mb-2 col-1 btn btn-secondary">ابحث</button>

            </div>
        </form>
        <hr>
    </div>
</div>

<div class="container">
    <div class="row">
        <h3 class="my-3">{{ $title }}</h3>
        <div class="mt-50 mb-50">
            <div class="row">

                @if($books->count())
                @foreach ( $books as $book )

                @if($book->number_of_copies > 0)
                <div class="col-lg-3 col-md-4 col-sm-6 md-4">
                    <div class="mb-3 card">
                        <div>
                            <div class="card-img-actions">
                                <a href="{{ route('books.details' , $book) }}">
                                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img img-fluid" width="96" height="350" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="text-center card-body bg-light">
                            <div class="mb-2">
                                <h6 class="mb-2 font-weight-semibold card-title">
                                    <a href="{{ route('books.details' , $book) }}" class="mb-0 text-default " data-abc="true">{{ $book->title }}</a>
                                </h6>
                                <a href="{{ route('gallery.categories.show' ,$book->category ) }}" class="text-muted" data-abc="true">
                                    @if ($book->category != Null)
                                    {{ $book->category->name }}
                                    @endif
                                </a>
                            </div>
                            <h3 class="mb-0 font-weight-semibold">{{ $book->price }}$</h3>
                            <div>
                                <span class="score">
                                    <div class="score-wrap">
                                        <span class="stars-active" style="width:{{ $book->rate()*20 }}%">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span class="stars-inactive">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

                @endforeach


                @else
                <div class="alert alert-info" role="alert">
                    لا يوجد نتائج
                </div>
                @endif

            </div>
        </div>
        {{ $books->links() }}
    </div>
</div>

@endsection
