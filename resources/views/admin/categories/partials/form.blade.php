<label for="">Cтатус</label>
<select name="published" class="form-control">
    @if(isset($category->id))
        <option value="0" @if($category->published == 0) selected="" @endif >Не опубликовано</option>
        <option value="1" @if($category->published == 1) selected="" @endif >Опубликовано</option>
        @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок Цвета" value="{{ $category->title or "" }}" required>

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{ $category->slug or ""}}" readonly="">

<label for="">Родительский Цвет</label>
<select name="parent_id" class="form-control">
    <option value="0">-- без родительского Цвета --</option>
    @include('admin.categories.partials.categories',['categories' => $categories])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
