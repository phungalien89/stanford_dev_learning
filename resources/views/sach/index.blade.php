@extends('layouts.admin')
@section('title', 'Danh sach Sach')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<a href="/sach/create" class="btn btn-success mb-3">
    <span class="fas fa-plus"></span>
    <span>Thêm sách</span>
</a>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <thead class="table-dark">
                <th>Ảnh sách</th>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Tác giả</th>
                <th>Đã duyệt</th>
                <th>Chỉnh sửa</th>
            </thead>
        </tr>
        @if ($sachs->count() > 0)
            @foreach ($sachs as $sach)
            <tr>
                <td style="vertical-align: middle">
                    <img style="width: 100px" src="{{ $sach->bookImage() }}" alt="{{ $sach->bookImage() }}">
                </td>
                <td>{{$sach->bookId}}</td>
                <td>{{$sach->bookName}}</td>
                <td>{{$sach->bookDesc}}</td>
                <td>{{ $sach->bookPrice }}</td>
                <td>{{ $sach->bookAuthor }}</td>
                <td>{{ $sach->bookApproved }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/sach/{{$sach->bookId}}/edit" class="btn">
                            <span class="fas fa-pencil-alt text-success"></span>
                        </a>
                        <button data-bookDesc="{{ $sach->bookDesc }}" data-bookImage="{{ $sach->bookImage() }}" data-bookId="{{ $sach->bookId }}" data-bookName="{{ $sach->bookName }}" class="btn" type="button" data-bs-toggle ="modal" data-bs-target ="#modal_sach_delete">
                            <span class="fas fa-trash-alt text-danger"></span>
                        </button>
                    </div>
                </td>
            @endforeach

        @endif
        <div id="modal_sach_delete" class="modal fade" data-bs-backdrop="static" data-bs-keyboard ="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Xóa <span id="modal_sach_delete_title" class="fw-bolder"></span>
                    </div>
                    <div class="modal-body">
                        <div>Bạn có muốn xóa <span  id="modal_sach_delete_content" class="fw-bolder"></span>?</div>
                        <div class="w-25 mx-auto mt-3">
                            <img src="" alt="" class="w-100 img-thumbnail">
                        </div>
                        <div id="desc" class="mt-3"></div>
                    </div>
                    <div class="modal-footer d-flex">
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger me-auto">Xóa</button>
                        </form>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-success ms-auto">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </table>
</div>
<script>
    $(document).ready(()=>{
        $('#btnDeleteSach').on("click", ()=>{
        return confirm("Bạn có muốn xóa dữ liệu này?");
        });
        $('#modal_sach_delete').on('show.bs.modal', (e)=>{
            var btnDelete = e.relatedTarget;
            var bookName = $(btnDelete).attr('data-bookName');
            var bookId = $(btnDelete).attr('data-bookId');
            var bookImage = $(btnDelete).attr('data-bookImage');
            var bookDesc = $(btnDelete).attr('data-bookDesc');
            $('#modal_sach_delete #modal_sach_delete_title').html(bookName);
            $('#modal_sach_delete #modal_sach_delete_content').html(bookName);
            $('#modal_sach_delete form').attr('action', '/sach/' + bookId);
            $('#modal_sach_delete .img-thumbnail').attr({
                'src' : bookImage,
                'alt' : bookImage
            });
            $("#modal_sach_delete #desc").html(bookDesc);
        });
    });
</script>
@endsection