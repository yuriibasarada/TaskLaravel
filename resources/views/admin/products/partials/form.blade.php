<label for="">Cтатус</label>
<select name="published" class="form-control">
    @if(isset($product->id))
        <option value="0" @if($product->published == 0) selected="" @endif >Не опубликовано</option>
        <option value="1" @if($product->published == 1) selected="" @endif >Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок Продукта" value="{{ $product->title or "" }}">

<label for="">Фотография</label>
<input id="image" type="file" class="form-control" name="image" value="" required >



<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{ $product->slug or ""}}" readonly="">

<label for="">Цвет</label>
<select name="categories[]" multiple="" class="form-control">
    @include('admin.products.partials.categories',['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{ $product->description_short or "" }}</textarea>


<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{ $product->description or "" }}</textarea>


<label for="">Мета Заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{ $product->meta_title or "" }}" required>

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{ $product->meta_description or "" }}" required>

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="{{ $product->meta_keyword or "" }}" required>



<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
