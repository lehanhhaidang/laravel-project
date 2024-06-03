@include('backend.user.component.breadcrumb',['title'=>$config['seo']['create']['title']])

<form action="" method="post" class="box">
    <div class="wrapper wrapper-content animated fade-in-right">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">
                        Thong tin chung
                    </div>
                    <div class="panel-description">
                        Nhap thong tin chung
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Email
                                    </label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
