@extends('layouts.admin.main')
@section('title', 'User')

@section('css')
<link rel="stylesheet" href="{{ url('public/admin/css/pages/user.css') }}">

@stop

@section('title-content','Quản lý user')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>
<div class="row justify-content-between gap-5 p-3">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-3 card">
        <div class="header-filter">
            <h3>Lọc</h3>
        </div>
        <div class="content-filter">
            <div class="wrapper-select">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" id="status">
                    <option value="1"><span>Hoạt động</span></option>
                    <option value="0"><span>Khóa</span></option>
                </select>
            </div>
            <div class="wrapper-select">
                <label for="sort-follower" class="form-label">Sắp xếp theo follower</label>
                <select name="" id="sort-follower">
                    <option value="1"><span>Tăng</span></option>
                    <option value="0"><span>Giảm</span></option>
                    <option value=""><span>asd</span></option>
                    <option value=""><span>asd</span></option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8 table-data">
        <div class="row">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="q-name" id="q-name">
                <div class="wrapper-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
        <div id="tbUser">


            <!-- <div class="row card">
                <table class="table table-user align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Avatar</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Username</th>

                            <th scope="col">Trạng thái</th>
                            <th scope="col">Follower</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <div class="avatar-radius">
                                    <img src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_jpeg/avatars/1/a/c/9/1ac927d990a98c2716f0e556fa3a004e.jpg" alt="">
                                </div>
                            </th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td class="status-user"><span class="badge bg-success">Success</span></td>
                            <td>1</td>
                            <td><a href="#" target="_blank">Huyen-Tam-Mon</a></td>
                            <td>
                                <a href="#" class="wrapper-icon bg-primary">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div> -->
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-submit-change-active-user">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal-submit-change-active-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <div class="wrapper-icon" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </div>

            </div>
            <div class="modal-body">
                <p>Bạn có đồng ý tắt trạng thái hoạt động của <strong id="name-status">Toanf2103</strong> không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                <button type="button" class="btn btn-outline-success">Đồng ý</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    const modalChangeStatusUser = new bootstrap.Modal(document.getElementById('modal-submit-change-active-user'), {
        keyboard: false
    })

    function showModalChangeStatusUser(name) {
        document.getElementById('name-status').innerHTML = name;
        modalChangeStatusUser.show();
    }
</script>
<script src="{{  url('public/admin/js/callApi.js')  }}"></script>
@stop
