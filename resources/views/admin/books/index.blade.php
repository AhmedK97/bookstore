@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
عرض الكتب
@endsection


@section('content')
<a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> اضف كاتب جديد </a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table text-right table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الرقم التسلسلى</th>
                    <th>التصنيف</th>
                    <th>المؤلفون</th>
                    <th>الناشر</th>
                    <th>السعر</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book )
                <tr>
                    <td><a href="{{ route('books.show' , $book) }}">{{$book->title }}</a></td>
                    <td><a href="#">{{$book->isbn }}</a></td>
                    <td><a href="#">{{$book->category !=null ? $book->category->name : ''}}</a></td>
                    <td>
                        @if ($book->authors()->count() > 0)
                        @foreach ($book->authors as $author )
                        {{ $loop->first ? '' : 'و' }}
                        {{ $author->name }}

                        @endforeach
                        @endif
                    </td>
                    <td>{{ $book->publisher !=null ? $book->publisher->name : '' }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <a class="btn-info btn-sm" href="{{ route('books.edit' , $book) }}"><i class="fa fa-edit"></i> تعديل </a>
                        <form action="{{route('books.destroy', $book)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn-sm" onclick="return confirm('هل انت متاكد ؟')"><i class="fa fa-trash"></i>
                                حذف</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#books-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
        });
    });
</script>
@endsection
