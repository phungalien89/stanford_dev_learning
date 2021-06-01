@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('breadcrumb')
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
            <a href="/themmoi_nhanvien" class="btn btn-primary mb-3">Thêm mới</a>
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                    </tr>
                </thead>
                @foreach($arrNhanVien as $nhanVien)
                    <tr>
                        <td>{{$nhanVien->maNV}}</td>
                        <td>{{$nhanVien->hoTen}}</td>
                        <td>{{$nhanVien->email}}</td>
                        <td>{{$nhanVien->diaChi}}</td>
                        <td>{{$nhanVien->dienThoai}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection