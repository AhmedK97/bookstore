@extends('theme.default')

@section('heading')
اضف تصنيفا جديدا
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="mb-4 card col-md-8">
        <div class="card-heading text">
            اضف تصنيفا جديدا
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="name" class="col-md-4 col-form-label text-md-right">اسم التصميف</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                               autocomplete="name">
                        @error('name')
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
