@extends('theme.default')

@section('heading')
عرض تفاصيل الكتاب
@endsection


@section('head')
<style>
    table {
        table-layout: fixed;

    }

    table tr th {
        width: 30%;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">

            <div class="card-header">عرض تفاصيل الكتاب</div>
            <div class="card-body" style="padding:0">
                <table class="table table-striped">
                    <tr>
                        <th>العنوان</th>
                        <td class="lead"><b>{{ $book->title }}</b></td>
                    </tr>
                    @if ($book->isbn)
                    <tr>
                        <th>الرقم التسلسلى</th>
                        <td>{{ $book->isbn }}</td>
                    </tr>
                    @endif

                    <tr>
                        <th>صورة الغلاف</th>
                        <td> <img class='img-fluid img-thumbnail' src="{{ asset('storage/' . $book->cover_image) }}" alt=""> </td>
                    </tr>
                    @if ($book->category)
                    <tr>
                        <th>التصنيف</th>
                        <td>{{ $book->category->name }}</td>
                    </tr>
                    @endif

                    @if ($book->authors()->count() >0)
                    <tr>
                        <th>المؤلفين</th>
                        <td>
                            @foreach ($book->authors as $author )
                            {{ $loop->first ? '' : 'و'}}
                            {{ $author->name }}
                            @endforeach
                        </td>
                    </tr>
                    @endif

                    @if ($book->publisher)
                    <tr>
                        <th>الناشر</th>
                        <td> {{ $book->publisher->name }} </td>
                    </tr>
                    @endif

                    @if ($book->description)
                    <tr>
                        <th>الوصف</th>
                        <td>{{ $book->description }}</td>
                    </tr>
                    @endif


                    @if ($book->publish_year)
                    <tr>
                        <th>سنه النشر</th>
                        <td>{{ $book->publish_year }}</td>
                    </tr>
                    @endif

                    <tr>
                        <th>عدد الصفحات</th>
                        <td>{{ $book->number_of_pages }}</td>
                    </tr>

                    <tr>
                        <th>عدد النسخ</th>
                        <td>{{ $book->number_of_copies }}</td>
                    </tr>

                    <tr>
                        <th>السعر</th>
                        <td>{{ $book->price }}$</td>
                    </tr>

                </table>
                <a class="btn-info btn-sm" href="{{ route('books.edit' , $book) }}"><i class="fa fa-edit"></i> تعديل </a>
                <form action="{{route('books.destroy', $book)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متاكد ؟')"><i class="fa fa-trash"></i>
                        حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
