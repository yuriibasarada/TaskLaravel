@if($errors->any())
        <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                @endforeach
                </ul>
        </div>
        @endif
<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')){{old('name')}}@else{{ $user->name or "" }}@endif" required>

<label for="">Email</label>
<input type="email" class="form-control" name="email" placeholder="Email" value="@if(old('name')){{old('name')}}@else{{ $user->email or "" }}@endif" required>

<label for="">Пароль</label>
<input type="password" class="form-control" name="password" required>

<label for="">Подтверждения</label>
<input type="password" class="form-control" name="password_confirmation">

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
