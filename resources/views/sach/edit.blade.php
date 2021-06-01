@extends('layouts.admin')
@section('title', 'Thêm sách mới')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <div class="col-md-10 col-lg-8 mx-auto">
        <form method="post" action="/sach/{{ $sach->bookId }}" class="card shadow" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-header">
                <div class="fw-bolder fs-2">Sửa sách</div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="bookName" class="form-label">Tên sách</label>
                    <input value="{{ old('bookName') ?? $sach->bookName }}" type="text" name="bookName" id="bookName" class="form-control">
                    @error('bookName')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bookDesc" class="form-label">Mô tả</label>
                    <textarea name="bookDesc" id="bookDesc" class="form-control">{{ old('bookDesc') ?? $sach->bookDesc }}</textarea>
                    @error('bookDesc')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Chủ đề</label>
                    <select name="subjectId" id="subjectId" class="form-control form-select">
                        @foreach ($chude as $cd)
                            <option <?= (old('subjectId') ?? $sach->subjectId ) == $cd->subjectId ? 'selected' : '' ?> value="{{$cd->subjectId}}">{{$cd->subjectName}} ( {{ $cd->subjectId }} )</option>
                        @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label for="bookImage" class="form-label">Ảnh sách</label>
                    <input type="file" name="bookImage" id="bookImage" class="form-control">
                    <div class="d-flex mt-3">
                        <img class="img-thumbnail mx-auto" style="width: 100px" src="{{ $sach->bookImage() }}" alt="{{ $sach->bookImage() }}">
                    </div>
                    @error('bookImage')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 d-flex">
                    <button class="btn btn-success" type="submit">
                        <span class="fas fa-plus"></span>
                        <span>Cập nhật</span>
                    </button>
                    <a href="/sach" class="btn btn-danger ms-auto">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('#bookImage').on('change', (e)=>{
            var path = URL.createObjectURL(e.target.files[0]);
            $('.img-thumbnail').attr('src', path);
        });
    </script>
@endsection