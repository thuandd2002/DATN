@inject('mobiledetect','Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/home_insight.min.css') }}">
@endsection

@section('content')
    <style>
        .contact__info_hide {
            display: none !important;
        }
        .contact__info {
            min-height: 60vh;
        }
    </style>
    <section>
        <div class="contact__info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row" >
                            <form action="{{ route('post.forgot.password') }}" method="POST" id="form--footer-info" style="background-color: #e0e1e3;padding: 20px;border-radius: 5px;">
                                @csrf
                                <fieldset>
                                    <legend style="margin-bottom: 20px;">Quên mật khẩu </legend>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <lable>Email <span style="color: red">(*)</span></lable>
                                            <input type="email" required class="form-control" name="email" placeholder="quangdo.hyundai@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 20px">
                                        <button type="submit" class="btn btn-sm btn-info" ><i class="fa fa-save"></i> Gửi mail</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/home.min.css') }}"</script>
@endsection
