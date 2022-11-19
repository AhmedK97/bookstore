@extends('theme.default')



@section('heading')
اضافه كتاب جديد
@endsection


@section('content')
<div class="row justify-content-center">
    <div class="mb-4 card col-md-8">
        <div class="card-heading text">
            اضــف كتابا جديدا
        </div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="title" class="col-md-4 col-form-label text-md-right">عنوان الكتاب</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"
                               autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="col-md-6">
                        <label for="title" class="col-md-4 col-form-label text-md-right">الــرقم التسلسلى</label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}"
                               autocomplete="isbn">
                        @error('isbn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="title" class="col-md-4 col-form-label text-md-right">صورة الغلاف</label>
                        <input onChange="readCoverImage(this);" type="file" accept="image/*" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                               value="{{ old('cover_image') }}" autocomplete="cover_image">
                        @error('cover_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <img id='cover-image-thumb' class="img-fluid img-thumbnail" src="" >
                    </div>


                    <div class="col-md-6">
                        <label for="category" class="col-md-4 col-form-label text-md-right">التصنيف</label>
                        <select id='category' class="form-control" name='category'>
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="col-md-6">
                        <label for="authors" class="col-md-4 col-form-label text-md-right">المؤلفين</label>

                        <select id='authors' multiple class="form-control" name='authors[]'>
                            @foreach ($authors as $author )
                            <option value="{{$author->id}}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('authors')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="publisher" class="col-md-4 col-form-label text-md-right">الناشر</label>
                        <select id='publisher' class="form-control" name='publisher'>
                            @foreach ($publishers as $publisher )
                            <option value="{{$publisher->id}}">{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                        @error('publisher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="description" class="col-md-4 col-form-label text-md-right">الوصف</label>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                  value="{{ old('description') }}" autocomplete="description"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="publish_year" class="col-md-4 col-form-label text-md-right">سنه النشر</label>
                        <input type="number" class="form-control @error('publish_year') is-invalid @enderror" name="publish_year"
                               value="{{ old('publish_year') }}" autocomplete="publish_year">
                        @error('publish_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="number_of_pages" class="col-md-4 col-form-label text-md-right">عدد الصفحات</label>
                        <input type="number" class="form-control @error('number_of_pages') is-invalid @enderror" name="number_of_pages"
                               value="{{ old('number_of_pages') }}" autocomplete="number_of_pages">
                        @error('number_of_pages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="number_of_copies" class="col-md-4 col-form-label text-md-right">عدد النسخ</label>
                        <input type="number" class="form-control @error('number_of_copies') is-invalid @enderror" name="number_of_copies"
                               value="{{ old('number_of_copies') }}" autocomplete="number_of_copies">
                        @error('number_of_copies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="price" class="col-md-4 col-form-label text-md-right">السعر</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}"
                               autocomplete="price">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="mb-0 form-group row">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">اضافه</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#cover-image-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
