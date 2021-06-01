@extends('layouts.admin')
@section('title', 'Thêm mới phòng ban')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<div class="alert alert-success">
    <div class="fw-bolder fs-2">Chỉnh sửa phòng ban</div>
</div>
<form action="/phongban/themmoi" method="post">
    @csrf
    <div class="mb-3">
        <label for="maphong" class="form-label">Mã phòng</label>
        <input value="{{ $objPhongBan->MaPhong }}" type="text" name="maphong" id="maphong" class="form-control">
        @error('maphong')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tenphong" class="form-label">Tên phòng</label>
        <input value="{{ $objPhongBan->TenPhong }}" type="text" name="tenphong" id="tenphong" class="form-control">
    </div>
    <div class="mb-3 d-flex">
        <button class="btn btn-success">Thêm</button>
        <a class="btn btn-danger ms-auto" href="/phongban/danhsach">Hủy</a>
    </div>
</form>
@endsection