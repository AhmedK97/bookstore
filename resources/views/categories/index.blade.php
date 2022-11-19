@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    التــصنيفات
                </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form action="{{ route('gallery.categories.search') }}" method="GET">
                                <div class="row d-flex justify-content-center">
                                    <input type="text" class="mb-2 col-3 mx-sm-3" required name="term" placeholder="ابحث عن كتاب">
                                    <button type="submit" class="mb-2 col-1 btn btn-secondary">ابحث</button>
                                </div>
                            </form>

                        </div>

                        <hr>
                        <br>
                        <h3 class="md-4">{{ $title }}</h3>
                        @if ($categories->count())

                        <ul class="list-group">
                            @foreach ($categories as $category )
                            <a href="{{ route('gallery.categories.show' , $category) }}" class="color:gray">
                                <li class="list-group-item">
                                    {{ $category->name }} ({{ $category->books->count() }})
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
