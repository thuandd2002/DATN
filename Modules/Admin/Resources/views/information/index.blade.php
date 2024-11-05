@extends('admin::layouts.master')
@section('titlePage','Cấu hình website')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Thông tin website</li>  -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
                                <button class="btn btn-sm btn-primary"  type="submit"><i class="fa fa-save"></i> Cập nhật </button>
                                <button class="btn btn-sm btn-danger" type="reset">
                                    <i class="fa fa-ban"></i> Reset</button>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Thông Tin Công Ty</h4>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Tên công ty<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_company" value="{{ old('if_company',isset($information->if_company) ? $information->if_company : '') }}" type="text" placeholder="Công ty cổ phần ....">
                                                @if($errors->has('if_company'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_company') }}</em>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Địa chỉ<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_address" value="{{ old('if_address',isset($information->if_address) ? $information->if_address : '') }}" type="text" placeholder="Mời bạn nhập địa chỉ">
                                                @if($errors->has('if_address'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_address') }}</em>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Email<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_email" value="{{ old('if_email',isset($information->if_email) ? $information->if_email : '') }}" type="text" placeholder="Mời bạn nhập địa chỉ email">
                                                @if($errors->has('if_email'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email') }}</em>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Số điện thoại <span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_phone" value="{{ old('if_phone',isset($information->if_phone) ? $information->if_phone : '') }}" type="text" placeholder="">
                                                @if($errors->has('if_phone'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_phone') }}</em>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Số Fax<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_fax" value="{{ old('if_fax',isset($information->if_fax) ? $information->if_fax : '') }}" type="text" placeholder="">
                                                @if($errors->has('if_fax'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_fax') }}</em>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Thời gian làm việc<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_time_job" value="{{ old('if_time_job',isset($information->if_time_job) ? $information->if_time_job : '') }}" type="text" placeholder="">
                                                @if($errors->has('if_time_job'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_time_job') }}</em>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <div class="fs-13">
                                                            <label for="street">Logo <span class="text-danger">(*)</span></label>
                                                            <span class="float-right"><b>jpg / png / jpge</b></span>
                                                        </div>
                                                        <?php
                                                        $avatar = isset($information->if_logo) ? pare_url_file($information->if_logo) : asset('images/placeholder.png');
                                                        ?>
                                                        <img class="profile-user-img img-thumbnail  img-responsive image-preview-upload" id="out_e_avatar"  src="{{ $avatar }}"><br>
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-primary"><i class="nav-icon icon-picture icons"></i> Chọn ảnh từ máy <input type="file" style="display: none;" multiple="" id="e_avatar" name="if_logo"> </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Meta Seo Home</h4>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Meta Title  </label>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_meta_title" value="{{ old('if_meta_title',isset($information->if_meta_title) ? $information->if_meta_title : '') }}" type="text" placeholder="">
                                                @if($errors->has('if_meta_title'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_meta_title') }}</em>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Meta Keywords  </label>
                                                </div>
                                                <textarea class="form-control" name="if_meta_keywords">{{ old('if_meta_keywords',isset($information->if_meta_keywords) ? $information->if_meta_keywords : '') }}</textarea>
                                                @if($errors->has('if_meta_keywords'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_meta_keywords') }}</em>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Meta Description  </label>
                                                </div>
                                                <textarea class="form-control" name="if_meta_description">{{ old('if_meta_description',isset($information->if_meta_description) ? $information->if_meta_description : '') }}</textarea>
                                                @if($errors->has('if_meta_description'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_meta_description') }}</em>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">INDEX, FOLLOW</label>
                                                </div>
                                                <select class="form-control" name="if_seo">
                                                    <option value="0" {{ old('if_seo',isset($information->if_seo) ? $information->if_seo : '') == 0 ? "selected='selected'"  : "" }}>INDEX, FOLLOW</option>
                                                    <option value="1" {{ old('if_seo',isset($information->if_seo) ? $information->if_seo : '') == 1 ? "selected='selected'"  : "" }}>NOINDEX, NOFOLLOW</option>
                                                    <option value="2" {{ old('if_seo',isset($information->if_seo) ? $information->if_seo : '') == 2 ? "selected='selected'"  : "" }}>INDEX, NOFOLLOW</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Cấu Hình Gửi Gmail</h4>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Email<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_email_send" value="{{ old('if_email_send',isset($information->if_email_send) ? $information->if_email_send : '') }}" type="text" placeholder=" emailsend@gmail.com ....">
                                                @if($errors->has('if_email_send'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email_send') }}</em>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Mật khẩu email<span class="text-danger">(*)</span></label>
                                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_email_password" value="{{ old('if_email_password',isset($information->if_email_password) ? $information->if_email_password : '') }}" type="password" placeholder="********">
                                                @if($errors->has('if_email_password'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email_password') }}</em>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="fs-13">
                                                            <label for="company">Email Drive<span class="text-danger">(*)</span></label>
                                                        </div>
                                                        <input class="form-control a_title"  name="if_email_drive" value="{{ old('if_email_drive',isset($information->if_email_drive) ? $information->if_email_drive : 'smtp') }}" type="text" placeholder="smtp">
                                                        @if($errors->has('if_email_drive'))
                                                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email_drive') }}</em>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="fs-13">
                                                            <label for="company">Email Hots<span class="text-danger">(*)</span></label>
                                                        </div>
                                                        <input class="form-control a_title"  name="if_email_host" value="{{ old('if_email_host',isset($information->if_email_host) ? $information->if_email_host : 'smtp.gmail.com') }}" type="text" placeholder="smtp.gmail.com">
                                                        @if($errors->has('if_email_host'))
                                                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email_host') }}</em>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="fs-13">
                                                            <label for="company">Email Port<span class="text-danger">(*)</span></label>
                                                        </div>
                                                        <input class="form-control a_title"  name="if_email_port" value="{{ old('if_email_port',isset($information->if_email_port) ? $information->if_email_port : '587') }}" type="text" placeholder="587">
                                                        @if($errors->has('if_email_port'))
                                                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email_port') }}</em>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="fs-13">
                                                            <label for="company">Email Encryption<span class="text-danger">(*)</span></label>
                                                        </div>
                                                        <input class="form-control a_title"  name="if_email_encryption" value="{{ old('if_email_encryption',isset($information->if_email_encryption) ? $information->if_email_encryption : 'tls') }}" type="text" placeholder="tls">
                                                        @if($errors->has('if_email_encryption'))
                                                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_email_encryption') }}</em>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Mạng Xã Hội</h4>
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Google + </label>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_google" value="{{ old('if_google',isset($information->if_google) ? $information->if_google : '') }}" type="text" placeholder="https://plus.google.com/u/0/106738833952998328415">
                                                @if($errors->has('if_google'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_google') }}</em>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Youtobe + </label>
                                                </div>
                                                <input class="form-control a_title" id="company" name="if_youtobe" value="{{ old('if_youtobe',isset($information->if_youtobe) ? $information->if_youtobe : '') }}" type="text" placeholder="https://www.youtube.com/channel/UCzloMZCKVhxiGKSVH7zJZkA">
                                                @if($errors->has('if_youtobe'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_youtobe') }}</em>
                                                @endif
                                            </div>
                                            {{--{{ dd($information) }}--}}
                                            <div class="form-group">
                                                <div class="fs-13">
                                                    <label for="company">Google map  </label>
                                                </div>
                                                <textarea class="form-control" name="if_google_map" style="height: 232px">{{ old('if_google_map',isset($information->if_google_map) ? $information->if_google_map : '') }}</textarea>
                                                @if($errors->has('if_meta_title'))
                                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('if_google_map') }}</em>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
