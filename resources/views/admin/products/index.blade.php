@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список Продуктов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Продукты @endslot
        @endcomponent

        <a href="{{route('admin.product.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>Создать Продукт</a>
        <table class="table table-striped">
            <thead>
            <th>Фото</th>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td><img src="{{ asset($product->image) }}" class="img-fluid" style="max-width: 150px; height: auto; "/></td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true}else{return false}" action="{{ route('admin.product.destroy', $product) }}" method="post">

                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{route('admin.product.edit', $product)}}"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$products->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection