@extends('layouts.template1')
@section('title', 'Trang chủ')
@section('noidung')
    <h1>Tên đăng nhập là: {{isset($email) ? $email : 'Chưa có'}}</h1>
    <h2>Tên đăng nhập là: {{$email ?? 'Chưa'}}</h2>
    <h3>giá trị lấy được từ share là <code>{{$domain}}</code></h3>
    <h3>giá trị lấy được từ share là <code>{{$author}}</code></h3>

@endsection