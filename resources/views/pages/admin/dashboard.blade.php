@extends('layouts.admin.main')
@section('title', 'Chỉnh sửa')

@section('css')

@stop

@section('title-content','Trang chủ')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>
<div class="row">
  <!-- Số lượt nge -->
  <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3  mb-4">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h6 class="">Lượt nge tháng này</h6>
            <h3 class="mb-2 number-font">{{ number_format($listenCountOfMonth) }}</h3>
            <p class="text-muted mb-0">
              @if($listenCountOfMonth > $listenCountLastMonth)
                <span class="text-primary">

                  <i class="fa fa-chevron-circle-up me-1"></i>
                @else
                <span class="text-danger">

                  <i class="fa fa-chevron-circle-down me-1"></i>

                @endif  
                {{ number_format(abs(($listenCountOfMonth - $listenCountLastMonth) / $listenCountLastMonth * 100), 2) }}%

              </span>
              tháng trước
            </p>
          </div>
          <div class="col col-auto d-flex align-items-center">
            <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
            <i class="fa-solid fa-headphones-simple"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- kết thúc số lượt nge -->

  <!-- Số lượt thích -->
  <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3  mb-4">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h6 class="">Lượt thích tháng này</h6>
            <h3 class="mb-2 number-font">{{ number_format($likesCountOfMonth) }}</h3>
            <p class="text-muted mb-0">
              @if($likesCountOfMonth > $likesCountLastMonth)
                <span class="text-primary">

                  <i class="fa fa-chevron-circle-up me-1"></i>
                @else
                <span class="text-danger">

                  <i class="fa fa-chevron-circle-down me-1"></i>

                @endif  
                {{ number_format(abs(($likesCountOfMonth -$likesCountLastMonth) / ($likesCountLastMonth) * 100),2) }}%
              </span>
              tháng trước
            </p>
          </div>
          <div class="col col-auto d-flex align-items-center">
            <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
            <i class="fa-regular fa-heart"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- kết thúc số lượt thích -->

  <!-- Số lượt theo dõi -->
  <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3  mb-4">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h6 class="">Lượt theo dõi tháng này</h6>
            <h3 class="mb-2 number-font">{{ number_format($followCountOfMonth) }}</h3>
            <p class="text-muted mb-0">
              @if($followCountOfMonth > $followCountLastMonth)
                <span class="text-primary">

                  <i class="fa fa-chevron-circle-up me-1"></i>
                @else
                <span class="text-danger">

                  <i class="fa fa-chevron-circle-down me-1"></i>

                @endif  
                {{ number_format(abs(($followCountOfMonth -$followCountLastMonth) / ($followCountLastMonth) * 100),2) }}%
              </span>
              tháng trước
            </p>
          </div>
          <div class="col col-auto d-flex align-items-center">
            <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
            <i class="fa-solid fa-person-circle-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- kết thúc số lượt theo dõi -->

  <!-- Số Người dùng mới -->
  <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3  mb-4">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h6 class="">User tháng này</h6>
            <h3 class="mb-2 number-font">{{ number_format($userCountOfMonth) }}</h3>
            <p class="text-muted mb-0">
              @if($userCountOfMonth > $userCountLastMonth)
                <span class="text-primary">

                  <i class="fa fa-chevron-circle-up me-1"></i>
                @else
                <span class="text-danger">

                  <i class="fa fa-chevron-circle-down me-1"></i>

                @endif  
                {{ number_format(abs(($userCountOfMonth - $userCountLastMonth) / $userCountLastMonth * 100),2)  }}%
              </span>
              tháng trước
            </p>
          </div>
          <div class="col col-auto d-flex align-items-center">
            <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
            <i class="fa-solid fa-user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- kết thúc số Người dùng mới -->

</div>






<div class="row">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xl-9 mb-4">
    <div class="card overflow-hidden chart">
      <div class="chart-title mb-5">
        <h2>Lượt nge 7 ngày qua</h2>
      </div>
      <div class="chart-content ">
        <canvas id="chart-view"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 col-sm-3 col-xl-3 mb-4 h-100">
    <div class="card overflow-hidden chart">
      <div class="chart-title mb-5">
        <h2>Thống kê lượt nge</h2>
      </div>
      <div class="chart-content ">
        <canvas id="type-view"></canvas>
      </div>
      <div class="row p-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-4 mt-4">
          <span class="legend "></span>
          <span>
            Lượt nghe ẩn danh
          </span>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-4">
          <span class="legend "></span>
          <span>
            Lượt nghe ẩn danh
          </span>
        </div>
      </div>
    </div>
  </div>

</div>
@stop


@section('js')
<script>
  // Define a Utils object with a months method
  const Utils = {
    months: ({
      count
    }) => {
      // Your logic to generate months labels goes here
      // For example, you can generate an array of month names
      const monthNames = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
      return monthNames.slice(0, count);
    }
  };
  const ctx = document.getElementById('chart-view');
  const labels = Utils.months({
    count: 12
  });
  const dataView = {
    labels: labels,
    datasets: [{
      label: 'Lượt nge',
      data: [65, 59, 80, 81, 56, 55, 40],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  };
  new Chart(ctx, {
    type: 'line',
    data: dataView,
    options: {
      scales: {
        y: {
          beginAtZero: false
        }
      }
    }
  });
</script>

<script>
  const typeView = document.getElementById('type-view');
  const dataPieListenCount = @json($arrayListen);
  const dataTypeView = {
    labels: [
      'Ẩn danh',
      'Người dùng'
    ],
    datasets: [{
      label: 'Lượt nge',
      data: dataPieListenCount,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
      ],
      hoverOffset: 4
    }]
  };
  new Chart(typeView, {
    type: 'pie',
    data: dataTypeView
  })
</script>
@stop