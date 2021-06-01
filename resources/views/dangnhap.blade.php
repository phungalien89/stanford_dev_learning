@extends('layouts.admin')
@section('title', 'Đăng nhập hệ thống')
@section('content')
<form action="/thuchiendangnhap2" method="post">
    @csrf
    <fieldset>
        <legend>Nhập thông tin đăng nhập</legend>
        <div class="mb-3">
            <label for="">Email</label>
            <input value="{{ old('email') }}" type="text" name="email" id="email" class="form-control">
            @error('email')
                <div class="invalid-feedback d-block">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="invalid-feedback d-block">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
    </fieldset>
</form>

@endsection