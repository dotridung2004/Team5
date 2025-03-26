<section>
    <h5 class="card-title mt-3"><strong>Giới thiệu</strong></h5>
    <p class="small fst-italic mb-3">{{$user->gioithieu}}</p>

    <h5 class="card-title mb-4"><strong>Chi tiết hồ sơ</strong></h5>
    @if($user->vaitro == 'admin')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Mã quản trị</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->admin->maquantri}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Họ và tên</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->admin->tenquantri}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Ngày sinh</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->admin->ngaysinh}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới tính</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->admin->gioitinh}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Địa chỉ</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->admin->quequan}}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Số điện thoại</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->sodienthoai}}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Trạng thái</strong></div>
        <div class="col-lg-9 col-md-8">
            @if($user->trangthai == 'active')
            <strong class="text">Hoạt động</strong>
            @else
            <span class="badge bg-danger">Khóa</span>
            @endif
        </div>
    </div>
    @elseif($user->vaitro == 'student')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Mã sinh viên</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->masinhvien}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Họ và tên</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->tensinhvien}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Ngày sinh</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->ngaysinh}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới tính</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->gioitinh}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Địa chỉ</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->quequan}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Khoa</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->khoa}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Lớp</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->student->lop}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Số điện thoại</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->sodienthoai}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Trạng thái</strong></div>
        <div class="col-lg-9 col-md-8">
            @if($user->trangthai == 'active')
            <strong class="text">Hoạt động</strong>
            @else
            <span class="badge bg-danger">Khóa</span>
            @endif
        </div>
    </div>
    @elseif($user->vaitro == 'teacher')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Mã giảng viên</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->teacher->magiaovien}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Họ và tên</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->teacher->tengiaovien}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Ngày sinh</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->teacher->ngaysinh}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới tính</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->teacher->gioitinh}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Địa chỉ</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->teacher->quequan}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Khoa</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->teacher->khoa}}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Số điện thoại</strong></div>
        <div class="col-lg-9 col-md-8">{{$user->sodienthoai}}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Trạng thái</strong></div>
        <div class="col-lg-9 col-md-8">
            @if($user->trangthai == 'active')
            <strong class="text">Hoạt động</strong>
            @else
            <span class="badge bg-danger">Khóa</span>
            @endif
        </div>
    </div>
    @endif
</section>