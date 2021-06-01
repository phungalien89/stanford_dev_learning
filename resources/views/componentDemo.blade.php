@extends('layouts.template1')
@section('title', 'Sử dụng component trong Laravel')
@section('noidung')
    @component('layouts.alert')
        @slot('class')
            alert-danger
        @endslot
        @slot('title', 'Thông báo lỗi')
        @slot('message')
            <b><i>Có lỗi xảy ra.</i></b>
        @endslot
    @endcomponent
    @component('layouts.alert')
        @slot('class', 'alert-success')
        @slot('title', 'Thông báo thành công')
        @slot('message')
            <code>Thực hiện thành công</code>
        @endslot
    @endcomponent
    <div class="fw-bolder fs-4">Ngày tháng năm hiện tại là: @datetime(Now())</div>
@endsection