@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>{{__('words.PageSettings')}}
                            </h3>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">لوحة التحكم</li>
                            <li class="breadcrumb-item active">إعدادات الموقع</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{__('words.Settings')}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('settings.update', $setting->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <style>
                                        img {
                                            border: 1px solid #ddd;
                                            border-radius: 20px;
                                            padding: 5px;
                                        }
                                    </style>
                                    <div class="form-group">
                                        <img src="{{ asset('public/' . $setting->logo) }}" class="w-25">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                             {{__('words.WebsiteLogo')}}</label>
                                        <input class="form-control" id="validationCustom05" type="file" name="logo">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset('public/' . $setting->about_image) }}" class="w-25">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                            {{__('words.ImagePageAbout')}}</label>
                                        <input class="form-control" id="validationCustom05" type="file" name="about_image">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset('public/' . $setting->favicon) }}" class="w-25">
                                        <label class="col-form-label"> {{__('words.FavIcon')}}</label>
                                        <input class="form-control" id="validationCustom05" type="file" name="favicon">
                                    </div>



                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                            {{__('words.SiteName')}}</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            value="{{ $setting->name }}">
                                    </div>


                                    <div class="form-group">
                                        <label class="col-form-label"> {{__('words.SiteDescription')}}</label>
                                        <textarea rows="5" cols="12" name="description">{{ $setting->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"> {{__('words.OurServices')}}</label>
                                        <textarea rows="5" cols="12" name="Our_Services">{{ $setting->Our_Services }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span>
                                              {{__('words.Email')}}</label>
                                        <input class="form-control" id="validationCustom02" type="text" name="email"
                                            value="{{ $setting->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> {{__('words.PhoneNumber')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="phone"
                                            value="{{ $setting->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">{{__('words.Address')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="address"
                                            value="{{ $setting->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> {{__('words.Facebook')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="facebook" value="{{ $setting->facebook }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> {{__('words.Twitter')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="twitter"
                                            value="{{ $setting->twitter }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">{{__('words.Instagram')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="instagram" value="{{ $setting->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">{{__('words.Linkedin')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="linkedin" value="{{ $setting->linkedin }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> {{__('words.Youtube')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="youtube" value="{{ $setting->youtube }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"> {{__('words.TikTok')}}</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="tiktok" value="{{ $setting->tiktok }}">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">{{__('words.Save')}}</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
