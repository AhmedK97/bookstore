@extends('theme.default')



@section('heading')
لوحه التحكم
@endsection

@section('content')

<div class="row">
    <div class="mb-4 col-xl-3 col-md-6">
        <div class="py-2 shadow card border-left-primary h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">عدد الكتب</div>
                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $number_of_books }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="text-gray-300 fas fa-book-open fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4 col-xl-3 col-md-6">
        <div class="py-2 shadow card border-left-info h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">عدد التصنيفات</div>
                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $number_of_categories }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="text-gray-300 fas fa-folder fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4 col-xl-3 col-md-6">
        <div class="py-2 shadow card border-left-warning h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">عدد المؤلفين</div>
                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $number_of_authors }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="text-gray-300 fas fa-pen-fancy fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4 col-xl-3 col-md-6">
        <div class="py-2 shadow card border-left-success h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="mr-2 col">
                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">عدد الناشرين</div>
                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $number_of_publishers }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="text-gray-300 fas fa-table fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
