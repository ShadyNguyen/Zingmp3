@extends('layouts.site.main')
@section('title', 'Chỉnh sửa')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/pages/search/main.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listAlbum.css') }}">
<link rel="stylesheet" href="{{ url('public/site/css/components/listArtist.css') }}">
<link rel="stylesheet" href="{{ url('public/partials/paginateCustom.css') }}">



@stop

@section('content')
<div class="search-content">

    <div class="search-header">
        <div class="search-header-content">
            <div class="header-content-title">
                <h3>Playlist của tôi</h3>
            </div>
            <div class="border-height" style="height: 4rem;">
                <div></div>
            </div>

            <a href="{{ route('site.mymusic.playlist') }}" class="header-content-item active">
                <span>
                    Playlist
                </span>
            </a>

        </div>
    </div>
    <div class="search-content">
        <div class="search-content-items search-content-header">
            <div class="items-content edit">
                <div class="wrapper-items-album">
                    <div class="items-album-img">
                        <img src="{{ $playlist->avatar ? $playlist->avatar : 'anh.jp' }}" alt="" onerror="replaceEmptyImage(this)">
                    </div>
                    <button class="item-actions play" @if($playlist->songs->count() > 0)
                        onclick="playAlbum('{{$playlist->id}}')"
                        @else
                        onclick="addNotification('notification','Danh sách phát này chưa có bài hát',3000)"
                        @endif
                        >
                        <i class="fa-regular fa-circle-play"></i>
                    </button>
                </div>
                <div class="name-user-album">
                    <div class="action">
                        <a href="#" class="name">{{ $playlist->title }}</a>
                        <div class="wrapper-icon" onclick="showModalEditPlaylist()" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                    </div>

                    <span>Tạo bởi <strong>{{ $playlist->user->name }}</strong> </span>
                    <span> {{ $playlist->status? "Công khai": "Riêng tư" }} </span>

                </div>
            </div>
            <div style="width: 100%;">
            <div class="edit-wrapper">
                <div class="search-content-item-title">
                    <p>Bài hát</p>
                </div>
                    @foreach($playlist->songs as $song)

                    <div class="search-content-item-song">
                        <x-song :song="$song" :isDelete="true" />
                    </div>

                    @endforeach
            </div>
            @if($playlist->songs()->count() == 0)
            <div class="search-content-items no-content">
                <div class="wrapper-icon">
                    <i class="fa-solid fa-compact-disc"></i>
                </div>
                <p>Không có bài hát nào</p>
            </div>
            @endif
            </div>
            

        </div>
        
    </div>
    <input value="{{ $playlist->id }}" id="_idPlaylist" type="hidden">
    <!-- Modal add playlist -->
    <div class="modal fade modal-add-playlist" id="modal-edit-play-list" tabindex="-1" aria-labelledby="modal-edit-play-list" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class=" modal-wrapper">
                    <div class="header-model d-flex">
                        <h3>
                            Chỉnh sửa playlist
                        </h3>
                        <div class="wrapper-icon" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                    <div class="action-item-content">
                        <input type="text" value="{{ $playlist->title }}" placeholder="Nhập tên playlist" id="name-edit-playlist" autocomplete="off">
                    </div>
                    <div class="action-model">
                        <div class="action-model-content">
                            <p>Công khai</p>
                            <span>Mọi người có thể nhìn thấy playlist này</span>
                        </div>
                        <div class="action-model-action">
                            <div class="form-check form-switch swich-model">
                                
                                <input @if($playlist->status) checked @endif class="form-check-input" id="status-edit-playlist" type="checkbox" name="check-status-edit-playlist">
                            </div>
                        </div>
                    </div>
                    <div class="action-model">
                        <div class="action-model-content">
                            <p>Phát ngẫu nhiên</p>
                            <span>Luôn phát ngẫu nhiên các bài hát</span>
                        </div>
                        <div class="action-model-action">
                            <div class="form-check form-switch swich-model">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-modal" id="btn-edit-play-list" onclick="submitEditPlayList('{{ $playlist->id }}')">
                    <button>Sửa</button>
                </div>
                @auth('user')
                <input type="hidden" value="{{ Auth::guard('user')->user()->id }}">
                @endauth
            </div>
        </div>
    </div>
    <!-- End Modal add playlist -->
    @stop

    @section('js')
    <script>
        const modalEditPlaylist = new bootstrap.Modal(document.getElementById('modal-edit-play-list'), options)
        const _id_playlist = document.getElementById('_idPlaylist').value;
        
        function showModalEditPlaylist() {
            modalEditPlaylist.show();
        }

        function submitEditPlayList(id_playlist) {
            const newName = document.getElementById('name-edit-playlist').value
            const newStatus = document.getElementById('status-edit-playlist').checked
            if (newName) {
                editPlayListCall(id_playlist, newName, newStatus);
            } else {
                addNotification(
                    ID_NOTIFICATION,
                    "Nhập đầy đủ thông tin",
                    4000
                );
            }
        }

        function editPlayListCall(id_playlist, newName, newStatus) {
            const urlCall = URL_WEB + "/api/editPlaylist"; // Thay đổi địa chỉ URL thành endpoint của bạn

            const id_user = _idUser.value;
            const formData = new FormData();


            formData.append("id_user", id_user);
            formData.append("id_playlist", id_playlist);
            formData.append("newName", newName);
            formData.append("newStatus", newStatus);


            // Gửi yêu cầu POST bằng Axios
            axios
                .post(urlCall, formData, {
                    headers: {
                        "Content-Type": "application/json", // Định dạng dữ liệu gửi lên là JSON
                        Accept: "application/json", // Header Accept: application/json
                    },
                })
                .then((response) => {
                    // Xử lý phản hồi từ máy chủ ở đây

                    const status = response.status;
                    if (status === 204) {
                        // Load lại trang web hiện tại
                        return id_playlist

                        // parentN.remove();
                    }
                })
                .then((id_playlist) => {
                    addNotification(
                        ID_NOTIFICATION,
                        setStringAction("Chỉnh sửa playlist", " ", "thành công!"),
                        4000
                    );
                    setTimeout(() => {
                        location.reload();
                    }, 1500)
                })
                .catch((error) => {

                    const status = error.response.status;

                    if (status === 422) {
                        addNotification(ID_NOTIFICATION, "Có lỗi, thử lại sau!", 4000);
                    } else {
                        addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
                    }
                });
        }
    </script>

    
    <script>
        function removeSongFromPlaylist(id_song,name_song){
            const urlCall = URL_WEB + "/api/deleteSongFromPlayList"; // Thay đổi địa chỉ URL thành endpoint của bạn

            const id_user = _idUser.value;
            const id_playlist = _id_playlist
            params = {
                id_user,
                id_playlist,
                id_song
            };

            // Gửi yêu cầu POST bằng Axios
            axios
                .get(urlCall, { params })
                .then((response) => {
                    // Xử lý phản hồi từ máy chủ ở đây

                    const status = response.status;
                    if (status === 204) {
                        // Load lại trang web hiện tại
                        return id_playlist

                        // parentN.remove();
                    }
                })
                .then((id_playlist) => {
                    addNotification(
                        ID_NOTIFICATION,
                        setStringAction("xóa thành công bài hát", name_song, "ra khỏi playlist!"),
                        4000
                    );
                    const pr = document.querySelector('div.wrapper-items-song.dropdown[data-song-id="' + id_song + '"]');
                    pr.remove();
                })
                .catch((error) => {

                    // const status = error.response.status;

                    if (status === 422) {
                        addNotification(ID_NOTIFICATION, "Có lỗi, thử lại sau!", 4000);
                    } else {
                        addNotification(ID_NOTIFICATION, "Có lối, thử lại sau!", 4000);
                    }
                });
        }
    </script>
    @stop