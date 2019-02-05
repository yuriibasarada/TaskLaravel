@extends('admin.layouts.app_admin')
@section('content')
    <div class="container" >
        <div class="row text-center" style="margin-top: 22px">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <p><span class="label label-primary">Цвета {{$count_categories}}</span></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <p><span class="label label-primary">Продукты {{$count_products}}</span></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('admin.category.create')}}" class="btn btn-block btn-default">Создать Цвет</a>
                @foreach($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$category->title}}</h4>
                        <P class="list-group-item-text">
                            {{$category->products()->count()}}
                        </P>
                    </a>
                    @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.product.create')}}" class="btn btn-block btn-default">Создать Продукт</a>
                @foreach($products as $product)
                    <a href="{{route('admin.product.edit', $product)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$product->title}}</h4>
                        <P class="list-group-item-text">
                             {{$product->categories()->pluck('title')->implode(", ")}}
                        </P>
                    </a>
                    @endforeach

            </div>
        </div>

    </div>
    @endsection