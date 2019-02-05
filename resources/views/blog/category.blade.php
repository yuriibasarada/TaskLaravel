@extends('layouts.app')
@section('title', $category->title . "- laravel" )

@section('content')
    <div class="container">
        @forelse($products as $product)
            <div class="row">
                <div class="col-sm-12">
                    <h2><a href="{{route('product', $product->slug)}}">{{$product->title}}</a></h2>
                    <p>{!!$product->desctiption_short!!}</p>
                </div>
            </div>
            @empty
                <h2 class="text-center">Пусто</h2>
        @endforelse

        {{$products->links()}}
    </div>
    @endsection