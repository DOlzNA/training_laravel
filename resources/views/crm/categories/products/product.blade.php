@extends('crm.layouts.app')
@section('content')

    <div class="container wrapper-primary py-3 px-4">

        <div class="row justify-content-between pb-2">
            <div class="col-lg">
                <form method="GET" action="{{route('crm.products.index')}}" accept-charset="UTF-8"
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
                <a href="{{route('crm.products.create')}}" class="btn btn-outline-success">
                    Добавить продукт

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
                категория
            </div>
        </div>
        @forelse($products as $product)

            <div class="border-bottom mb-1">
                <div class="row py-1" style="background-color: #c1f0c1">
                    <div class="col-1">
                        {{$product->getKey()}}
                    </div>
                    <div class="col-4">
                        {{$product->getName()}}
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12 small text-secondary">

                                {{$product->getPrice()}}
                            </div>
                        </div>                        <div class="row">
                        </div>                        <div class="row">
                            <div class="col-12 small text-secondary">

                                {!!$product->getDescription()!!}
                            </div>
                        </div>                       <div class="row">
                            <div class="col-12 small text-secondary">
                                <img
                                    src="{{$product->getImageUrl()}}" class="img-thumbnail" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col float-right text-right">

                        {{Form::open(['method'=>"DELETE", "url"=>route('crm.products.destroy',$product)])}}
                        <button class="btn btn-danger rounded-pill px-3">
                            delete
                        </button>
                        {{Form::close()}}

                        {{--                            <a href="{{route('crm.products.edit',$product)}}" class="btn btn-success">--}}

                        {{--                                Редактировать--}}
                        {{--                            </a>--}}

                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div>
@endsection
