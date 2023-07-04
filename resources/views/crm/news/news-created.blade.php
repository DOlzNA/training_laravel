@extends('crm.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-end">
                    <div class="col-auto">

                        {{Form::open(['url'=>route('crm.news.store'),'method'=>'POST',"enctype"=>"multipart/form-data"])}}

                        @include('forms.news-form')
                        <div>
                        {{Form::checkbox('is_publishing','1',true)}}

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
