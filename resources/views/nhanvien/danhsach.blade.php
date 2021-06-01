@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('breadcrumb')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="">Tables</a></li>
      <li class="breadcrumb-item active">Nhân viên</li>
    </ul>
  </div>
@endsection
@section('content')
    <div class="alert alert-success">
        <div class="fs-2 fw-bolder text-center text-uppercase font-monospace">thêm mới nhân viên</div>
    </div>
    <div class="container">
        <div class="col-sm-10 col-md-8 col-lg-6 max-auto mt-5">
            <div class="d-flex">
            <a href="/themmoi_nhanvien" class="btn btn-primary mb-3">Thêm mới</a>
            <form method="post" action="/danhsach" class="input-group">
                @csrf
                <div class="input-group-text">
                    <span class="fas fa-search"></span>
                </div>
                <input value="{{ $search }}" type="text" name="search" id="search" class="form-control">
                <select name="phongban" id="phongban" class="form-select">
                    <option {{ $phongban != "" ? '' : 'selected' }} disabled value="">--Chọn mã phòng--</option>
                    @foreach ($pb as $p)
                        <option {{ $p->MaPhong == $phongban ? 'selected' : '' }} value="{{ $p->MaPhong }}">{{ $p->TenPhong }}</option>
                    @endforeach
                </select>
                <button class="btn btn-success">
                    <span class="fas fa-search"></span>
                    <span>Tìm kiếm</span>
                </button>
            </form>
        </div>
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Phòng ban</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                @foreach($arrNV as $nv)
                    <tr>
                        <td>{{$nv->MaNV}}</td>
                        <td>{{$nv->HoTen}}</td>
                        <td>{{$nv->Email}}</td>
                        <td>{{$nv->MaPhong}}</td>
                        <td>{{$nv->DiaChi}}</td>
                    </tr>
                @endforeach
            </table>
            {{ $arrNV->appends(['search' => $search, 'phongban' => $phongban])->links() }}
        </div>
    </div>
@endsection