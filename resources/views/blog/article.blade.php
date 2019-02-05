@extends('layouts.app')

@section('title', $product->meta_title)
@section('meta_keyword', $product->meta_keyword)
@section('meta_description', $product->meta_description)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ asset($product->image) }}" class="img-fluid" style="max-width: 150px; height: auto; "/>
                <h1>{{$product->title}}</h1>
                <p>{!! $product->description !!}</p>
            </div>
        </div>
    </div>
@endsection