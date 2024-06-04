@include('backend.user.component.breadcrumb',['title'=>$config['seo']['create']['title']])

<form action="" method="post" class="box">
    <div class="wrapper wrapper-content animated fade-in-right">
        <div class="row px-5">
            <div class="col-lg-5 mt-3" >
                <div class="panel-head">
                    <div class="panel-title font-weight-bold text-dark h5 ">
                        Thông tin chung
                    </div>
                    <div class="panel-description text-dark">
                        Nhập thông tin người dùng
                    </div>
                </div>
            </div>
            <div class="col-lg-7 bg-white shadow-lg p-3 mb-5 bg-body rounded mt-2">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Email <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Họ tên <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Nhóm thành viên <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="" id=""class="form-control">
                                        <option value="0" >[Chọn nhóm thành viên]</option>
                                        <option value="1">Admin</option>
                                        <option value="2">CTV</option>
                                        <option value="3">Manager</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ngày sinh<span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="date"
                                    name="dayofbirth"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Nhập lại mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="password"
                                    name="repassword"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-5">
            <div class="col-lg-5 mt-3" >
                <div class="panel-head">
                    <div class="panel-title font-weight-bold text-dark h5 ">
                        Phương thức liên lạc
                    </div>
                    <div class="panel-description text-dark">
                       Điền vào phương thức liên lạc
                        <br>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 bg-white shadow-lg p-3 mb-5 bg-body rounded mt-2">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Thành phố
                                    </label>
                                      <select class="form-control" name="province_id" id="">
                                        <option value="0">[Chọn thành phố]</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Quận/Huyện
                                    </label>
                                    <select class="form-control" name="district_id" id="">
                                        <option value="0">[Chọn quận/huyện]</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Phường/Xã
                                    </label>
                                    <select class="form-control" name="ward_id" id="">
                                        <option value="0">[Chọn phường/xã]</option>
                                      </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Địa chỉ
                                    </label>
                                    <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Số điện thoại
                                    </label>
                                    <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ghi chú
                                    </label>
                                    <input
                                    type="text"
                                    name="description"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-3 mt-0">
            <button class="btn btn-primary px-5" type="submit" name="send" value="send">Lưu</button>
        </div>
    </div>
</form>



