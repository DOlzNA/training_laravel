@extends('crm.layouts.app')
@section('content')

    <div class="container wrapper-primary py-3 px-4">

        <div class="row justify-content-between pb-2">
            <div class="col-lg">
                <form method="GET" action="{{route('crm.categories.index')}}" accept-charset="UTF-8"
                      onchange="this.submit()">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class=" form-group position-relative  ">
                                <label class="form-control-label " for="input_5350_order-by">Сортировка&nbsp;</label>
                                <select id="input_5350_order-by" class="form-control   " name="order_by">
                                    <option selected="selected" value="Id">Id</option>
                                    <option value="name">Название</option>
                                    <option onchange="this.submit()" value="ordering">Порядок</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="row align-items-end">

                                <div class="col-auto">
                                    <div class="form-group ">
                                        <label for="basic-url">Поиск&nbsp;</label>
                                        <div class="input-group">
                                            <label>
                                                <input class="form-control  " name="search" type="text">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href=""
                                       class="btn btn-outline-secondary mb-3">

                                        <!-- <i class="fas fa-redo" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                        Сбросить
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-auto pb-3">
                <a href="{{route('crm.categories.create')}}" class="btn btn-outline-success">
                    Добавить категорию

                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-1">
                №
            </div>
            <div class="col-4">
                Название
            </div>
            <div class="col-2">
                Подкатегория
            </div>
        </div>
        @forelse($categories as $category)
            @if($category->getParentId()==null)

            <div class="border-bottom mb-1">
                <div class="row py-1" style="background-color: #c1f0c1">
                    <div class="col-1">
                        {{$category->getKey()}}
                    </div>
                    <div class="col-4">
                        {{$category->getName()}}
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12 small text-secondary">

                                <button class="btn btn-primary"> <a href="{{route('crm.categories.child.index',$category)}}">Просмотр</a> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col float-right text-right">

                        {{Form::open(['method'=>"DELETE", "url"=>route('crm.categories.destroy',$category)])}}
                        <button class="btn btn-danger rounded-pill px-3">
                            delete
                        </button>
                        {{Form::close()}}
{{--нет редактирования категорий--}}
{{--                        <a href="{{route('crm.categories.edit',$category)}}" class="btn btn-success">--}}

{{--                            Редактировать--}}
{{--                        </a>--}}

                    </div>
                </div>
            </div>
            @endif
        @empty
        @endforelse

    </div>
@endsection
