@extends('layouts.admin')
@section('title', 'Danh sách phòng ban')
@section('content')
<div class="alert alert-success">
    <div class="fw-bolder fs-2">Danh sách phòng ban</div>
</div>
<div class="my-3">
    <a class="btn btn-outline-success" href="/phongban/themmoi">Thêm mới</a>
</div>
<table class="table table-hover table-striped">
    <tr>
        <thead class="table-dark">
            <th>Mã phòng</th>
            <th>Tên phòng</th>
            <th>Chỉnh sửa</th>
        </thead>
    </tr>
    @if(count($phongban) > 0)
        @foreach ($phongban as $pb)
            <tr>
                <td>{{ $pb->MaPhong }}</td>
                <td>{{ $pb->TenPhong }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn" href="/phongban/sua/{{ $pb->MaPhong }}">
                            <span class="fas fa-pencil-alt text-success"></span>
                            <span>Sửa</span>
                        </a>
                        <form action="/phongban/xoa/{{ $pb->MaPhong }}" method="post">
                            @csrf
                            <a onclick="return confirm('Bạn muốn xóa?');" class="btn" href="/phongban/xoa/{{ $pb->MaPhong }}">
                                <span class="fas fa-trash-alt text-danger"></span>
                                <span>Xóa</span>
                            </a>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
</table>
@endsection