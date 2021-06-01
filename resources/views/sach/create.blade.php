@extends('layouts.admin')
@section('title', 'Thêm sách mới')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/ckeditor_styles.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <div class="col-md-10 col-lg-8 mx-auto">
        <form method="post" action="/sach" class="card shadow" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <div class="fw-bolder fs-2">Thêm sách mới </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="bookName" class="form-label">Tên sách</label>
                    <input value="{{ old('bookName') }}" type="text" name="bookName" id="bookName" class="form-control">
                    @error('bookName')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bookDesc" class="form-label">Mô tả</label>
                    <textarea name="bookDesc" id="bookDesc" class="form-control">{{ old('bookDesc') }}</textarea>
                    <div class="ckeditor-footer">
                        <div class="ckeditor-timer-container">
                            <input type="number" name="" id="" value="10">
                            <label for="">(sec)</label>
                        </div>
                        <div class="ckeditor-indicator">

                        </div>
                        <div class="ckeditor-button-save">
                            <button class="btn btn-success">
                                <span class="fas fa-save"></span>
                            </button>
                        </div>
                    </div>
                    @error('bookDesc')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <style>
                    .ckeditor-footer{
                        display: flex;
                        align-items: center;
                        background-color: var(--ck-color-toolbar-background);
                        border: 1px solid var(--ck-color-toolbar-border);
                        border-top: none;
                        border-radius: 0 0 var(--ck-border-radius) var(--ck-border-radius);
                    }
                    .ckeditor-timer-container{

                    }
                </style>
                <div class="mb-3">
                    <label class="form-label">Chủ đề</label>
                    <select name="subjectId" id="subjectId" class="form-control form-select">
                        @foreach ($chude as $cd)
                            <option <?= old('subjectId') == $cd->subjectId ? 'selected' : '' ?> value="{{$cd->subjectId}}">{{$cd->subjectName}} ( {{ $cd->subjectId }} )</option>
                        @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label for="bookImage" class="form-label">Anh sach</label>
                    <input type="file" name="bookImage" id="bookImage" class="form-control">
                    @error('bookImage')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 d-flex">
                    <button class="btn btn-success" type="submit">
                        <span class="fas fa-plus"></span>
                        <span>Thêm</span>
                    </button>
                    <a href="/" class="btn btn-danger ms-auto">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(()=>{
            let originEditor = null;
            let editor_desc = document.querySelector('#bookDesc');
            ClassicEditor.create(editor_desc, {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                }
            })
            .then(editor_desc => {
                originEditor = editor_desc;
            });
        });
    </script>
@endsection