@extends('theme.default')



@section('heading')
تعديل التصنيف
@endsection


@section('content')
<div class="row justify-content-center">
    <div class="mb-4 card col-md-8">
        <div class="card-heading text">
            تعديل التصنيف
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update' , $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> التصنيف</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name}}"
                               autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="col-md-6">
                        <label for="description" class="col-md-4 col-form-label text-md-right">الوصف</label>
                        <textarea type="text" class="form-control
                        @error('description') is-invalid @enderror" name="description"
                                  autocomplete="description">{{ $category->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>

                <div class="mb-0 form-group row">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">عدل</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
