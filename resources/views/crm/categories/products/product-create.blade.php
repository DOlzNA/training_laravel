@extends('crm.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-end">
                    <div class="col-auto">

                        {{Form::open(['url'=>route('crm.products.store'),'method'=>'POST',"enctype"=>"multipart/form-data"])}}

                        @include('crm.categories.forms.product-form')
                        <div>
                            {{Form::checkbox('is_published','1',true)}}

                        </div>
                        <div>
                            {{Form::select('category_id', $categories->pluck('name','id'))}}
                        </div>
                        <button class="btn btn-primary rounded-pill px-3">
                            Сохранить
                        </button>
                        {{Form::close()}}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
