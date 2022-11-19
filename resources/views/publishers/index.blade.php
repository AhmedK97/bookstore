@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    النــاشرون
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="container">
                            <div class="row">
                                <form action="{{ route('gallery.publishers.search') }}" method="GET">
                                    <div class="row d-flex justify-content-center">
                                        <input type="text" class="mb-2 col-3 mx-sm-3" required name="term" placeholder="ابحث عن ناشر">
                                        <button type="submit" class="mb-2 col-1 btn btn-secondary">ابحث </button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>

                    <hr>
                    <br>
                    <h3 class="md-4">{{ $title }}</h3>
                    @if ($publishers->count())

                    <ul class="list-group">
                        @foreach ($publishers as $publisher )
                        <a href="{{ route('gallery.publishers.show' , $publisher) }}" class="color:gray">
                            <li class="list-group-item">
                                {{ $publisher->name }} ({{ $publisher->books->count() }})
                            </li>
                        </a>
                        @endforeach

                    </ul>


                    @else
                    <div class="mx-auto mt-4 text-center col-12 aleart aleart-info">
                        لا نتـــائج
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
</div>




@endsection
