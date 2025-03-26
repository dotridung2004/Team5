@extends('layouts.admin')
@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title d-flex align-items-center gap-2 mb-4">
                        Tổng quan về doanh số bán hàng
                        <span>
                            <iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="Tổng quan lưu lượng"></iconify-icon>
                        </span>
                    </h5>
                    <div id="traffic-overview">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{url('assets/images/backgrounds/product-tip.png')}}" alt="image" class="img-fluid" width="205">
                    <h4 class="mt-7">Mẹo Năng Suất!</h4>
                    <p class="card-subtitle mt-2 mb-3">Duis at orci justo nulla in libero id leo
                        molestie sodales phasellus justo.</p>
                    <button class="btn btn-primary mb-3">Xem tất cả mẹo</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Xem theo tiêu đề trang và lớp màn hình</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="border-2 border-bottom border-primary border-0">
                                    <th scope="col" class="ps-0">Tiêu đề trang</th>
                                    <th scope="col">Liên kết</th>
                                    <th scope="col" class="text-center">Lượt xem trang</th>
                                    <th scope="col" class="text-center">Giá trị trang</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">Chào mừng đến với trang web của chúng tôi</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">/index.html</a>
                                    </td>
                                    <td class="text-center fw-medium">18,456</td>
                                    <td class="text-center fw-medium">$2.40</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">Mẫu Bảng Điều Khiển Quản Trị Hiện Đại</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">/dashboard</a>
                                    </td>
                                    <td class="text-center fw-medium">17,452</td>
                                    <td class="text-center fw-medium">$0.97</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">Khám phá danh mục sản phẩm của chúng tôi</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">/product-checkout</a>
                                    </td>
                                    <td class="text-center fw-medium">12,180</td>
                                    <td class="text-center fw-medium">$7.50</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">Hướng dẫn sử dụng toàn diện</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">/docs</a>
                                    </td>
                                    <td class="text-center fw-medium">800</td>
                                    <td class="text-center fw-medium">$5.50</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium border-0">
                                        <span class="table-link1 text-truncate d-block">Kiểm tra dịch vụ của chúng tôi</span>
                                    </th>
                                    <td class="border-0">
                                        <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">/services</a>
                                    </td>
                                    <td class="text-center fw-medium border-0">1300</td>
                                    <td class="text-center fw-medium border-0">$2.15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title d-flex align-items-center gap-2 mb-5 pb-3">Phiên theo thiết bị<span><iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="Vị trí"></iconify-icon></span>
                    </h5>
                    <div class="row">
                        <div class="col-4">
                            <iconify-icon icon="solar:laptop-minimalistic-line-duotone" class="fs-7 d-flex text-primary"></iconify-icon>
                            <span class="fs-11 mt-2 d-block text-nowrap">Máy tính</span>
                            <h4 class="mb-0 mt-1">87%</h4>
                        </div>
                        <div class="col-4">
                            <iconify-icon icon="solar:smartphone-line-duotone" class="fs-7 d-flex text-secondary"></iconify-icon>
                            <span class="fs-11 mt-2 d-block text-nowrap">Điện thoại</span>
                            <h4 class="mb-0 mt-1">9.2%</h4>
                        </div>
                        <div class="col-4">
                            <iconify-icon icon="solar:tablet-line-duotone" class="fs-7 d-flex text-success"></iconify-icon>
                            <span class="fs-11 mt-2 d-block text-nowrap">Máy tính bảng</span>
                            <h4 class="mb-0 mt-1">3.1%</h4>
                        </div>
                    </div>

                    <div class="vstack gap-4 mt-7 pt-2">
                        <div>
                            <div class="hstack justify-content-between">
                                <span class="fs-3 fw-medium">Máy tính</span>
                                <h6 class="fs-3 fw-medium text-dark lh-base mb-0">87%</h6>
                            </div>
                            <div class="progress mt-6" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-primary" style="width: 100%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="hstack justify-content-between">
                                <span class="fs-3 fw-medium">Điện thoại</span>
                                <h6 class="fs-3 fw-medium text-dark lh-base mb-0">9.2%</h6>
                            </div>
                            <div class="progress mt-6" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-secondary" style="width: 50%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="hstack justify-content-between">
                                <span class="fs-3 fw-medium">Máy tính bảng</span>
                                <h6 class="fs-3 fw-medium text-dark lh-base mb-0">3.1%</h6>
                            </div>
                            <div class="progress mt-6" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: 35%"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)">
                        <img src="{{url('assets/images/blog/blog-img1.jpg')}}" class="card-img-top" alt="matdash-img">
                    </a>
                    <span class="badge text-bg-light text-dark fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        phút đọc</span>
                    <img src="{{url('assets/images/profile/user-3.jpg')}}" alt="matdash-img" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Georgeanna Ramero">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Xã hội</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="">Khi đồng yên giảm, Nhật Bản yêu thích công nghệ chuyển sang iPhone cũ</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-eye text-dark fs-5"></i>9,125
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-message-2 text-dark fs-5"></i>3
                        </div>
                        <div class="d-flex align-items-center fs-2 ms-auto">
                            <i class="ti ti-point text-dark"></i>Thứ Hai, 19 Tháng 12
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)">
                        <img src="{{url('assets/images/blog/blog-img2.jpg')}}" class="card-img-top" alt="matdash-img">
                    </a>
                    <span class="badge text-bg-light text-dark fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        phút đọc</span>
                    <img src="{{url('assets/images/profile/user-2.jpg')}}" alt="matdash-img" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Georgeanna Ramero">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Công nghệ</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="">Intel thất bại trong việc khôi phục vụ kiện chống độc quyền chống lại đối thủ bằng sáng chế Fortress</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-eye text-dark fs-5"></i>4,150
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-message-2 text-dark fs-5"></i>38
                        </div>
                        <div class="d-flex align-items-center fs-2 ms-auto">
                            <i class="ti ti-point text-dark"></i>Chủ Nhật, 18 Tháng 12
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)">
                        <img src="{{url('assets/images/blog/blog-img3.jpg')}}" class="card-img-top" alt="matdash-img">
                    </a>
                    <span class="badge text-bg-light text-dark fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        phút đọc</span>
                    <img src="{{url('assets/images/profile/user-3.jpg')}}" alt="matdash-img" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Georgeanna Ramero">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Sức khỏe</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="">Bùng phát COVID ngày càng nghiêm trọng khi nhiều đợt phong tỏa sắp xảy ra ở Trung Quốc</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-eye text-dark fs-5"></i>9,480
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="ti ti-message-2 text-dark fs-5"></i>12
                        </div>
                        <div class="d-flex align-items-center fs-2 ms-auto">
                            <i class="ti ti-point text-dark"></i>Thứ Bảy, 17 Tháng 12
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Thiết kế và phát triển bởi <a href="https://adminmart.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Phân phối bởi <a href="https://themewagon.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
    </div>
</div>
@endsection