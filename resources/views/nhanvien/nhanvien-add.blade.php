@extends('layouts.admin')
@section('title', 'Thêm mới nhân viên')
@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="">Tables</a></li>
      <li class="breadcrumb-item active"><a href="/danhsach">Nhân viên</a></li>
      <li class="breadcrumb-item active">Thêm</li>
    </ul>
  </div>
@endsection
@section('content')
<div class="col-sm-8 col-md-6 col-lg-4 mx-auto mt-5">
    <form action="/themmoi_nhanvien" method="post" class="card shadow" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="fs-2 fw-boldler">Thêm mới nhân viên</div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="manv" class="form-label">Mã nhân viên</label>
                <input type="text" name="manv" id="manv" class="form-control">
            </div>
            <div class="mb-3">
                <label for="hoten" class="form-label">Họ tên</label>
                <input type="text" name="hoten" id="hoten" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <div class="form-floating">
                    <textarea name="diachi" placeholder="diachi" id="diachi" class="form-control" cols="30" style="height: 120px; min-height: 120px"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="dienthoai" class="form-label">Điện thoại</label>
                <input name="dienthoai" placeholder="dienthoai" id="dienthoai" class="form-control"></input>
            </div>
            <div class="mb-3 d-flex">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <a href="/danhsach" class="btn btn-danger ms-auto">Hủy</a>
            </div>
        </div>
    </form>
</div>
@endsection