@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
عرض الناشرين
@endsection


@section('content')
<a href="{{ route('publishers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> اضف ناشر جديد </a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table text-right table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>الاســـم</th>
                    <th>العنوان</th>
                    <th>خــيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher )
                <tr>
                    <td>{{ $publisher->name }}</td>
                    <td>{{ $publisher->address }}</td>
                    <td>
                        <a class="btn-info btn-sm" href="{{ route('publishers.edit' , $publisher) }}"><i class="fa fa-edit"></i> تعديل </a>
                        <form action="{{route('publishers.destroy', $publisher)}}" method="POST" class="d-inline-block">
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
