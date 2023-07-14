@extends('crm.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-end">
                    <div class="col-auto">

                        {{Form::open(['url'=>route('crm.categories.store'),'method'=>'POST'])}}

                        @include('crm.categories.forms.category-form')
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
