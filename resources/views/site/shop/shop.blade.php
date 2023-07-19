@extends('site.layouts.app')
@section('content')
    <div class="main">


        <div class="flex-shrink-0 p-3 col-3" style="width: 280px;">
            <a href="/"
               class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-5 fw-semibold"><ya-tr-span data-index="17-0" data-translated="false"
                                                           data-source-lang="en" data-target-lang="ru"
                                                           data-value="Collapsible" data-translation="Разборный"
                                                           data-ch="0"
                                                           data-type="trSpan">Collapsible</ya-tr-span></span>
            </a>
            @forelse($categories as $category)
                @if($category->getParentId()===null)
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                            <button
                                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#{{$category->getKey()}}-collapse"
                                aria-expanded="false" action>
                                <ya-tr-span data-index="18-0" data-translated="false" data-source-lang="en"
                                            data-target-lang="ru" data-value=" Home "
                                            data-translation=" Главная "
                                            data-ch="1" data-type="trSpan" data-selected="false" action="">
                                    {{$category->getName()}}  </ya-tr-span>
                            </button>
                            <div class="collapse" id="{{$category->getKey()}}-collapse" style="">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    @forelse($categories as $childCategory)
                                        @if($childCategory->getParentId()==$category->getKey())
                                            <li>
                                                <a href="{{route('site.shops.index',['category_id'=>$childCategory->getKey()])}}"
                                                   class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                                                    <ya-tr-span data-index="19-0" data-translated="false"
                                                                data-source-lang="en" data-target-lang="ru"
                                                                data-value="Overview" data-translation="Обзор"
                                                                data-ch="0"
                                                                data-type="trSpan">{{$childCategory->getName()}}
                                                    </ya-tr-span>
                                                </a></li>
                                        @endif
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </li>
                    </ul>
                @endif
            @empty
            @endforelse

        </div>

        <div class="container">
            <div class="col-12">
                @forelse($products as $product)

                    <div class="border-bottom mb-1">
                        <div class="row py-1" style="background-color: #c1f0c1">

                            <div class="col-2">
                                {{$product->getName()}}
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-12 small text-secondary">
                                        <img
                                            src="{{$product->getImageUrl()}}" class="img-thumbnail" alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 text-center">
                                {!! $product->getDescription()!!}
                            </div>
                            <div class="col-1 text-center">
                            </div>
                        </div>
                    </div>

                @empty
                    <div>Игорь пидр</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

