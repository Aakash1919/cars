@extends('layouts.user')
@section('content')
    <div class="">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{ $langg->lang8 }} </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('user.car.create') }}">{{ $langg->lang96 }} </a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Selling a car</h5>
                    <hr />
                    <form class="add-form" id="geniusform" action="{{ route('user.car.store') }}" method="POST"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-7 offset-lg-3">
                                @include('includes.admin.form-both')
                            </div>
                        </div>
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">{{ $langg->lang102 }} *</label>
                                            <input class="form-control" id="title" type="text" name="title"
                                                placeholder="{{ $langg->lang101 }} {{ $langg->lang102 }}" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nicDesc" class="form-label">{{ $langg->lang126 }} *</label>
                                            <textarea id="nicDesc" name="description" class="form-control nic-edit" rows="8"
                                                cols="80">Please detail any issues with vehicle and any damaged or parts removed here</textarea>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="border border-3 p-4 rounded">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="col-12" id="app">
                                                <label class="form-label">{{ $langg->lang130 }} </label>
                                                <div class="row">
                                                    @foreach ($CarsAccessories as $accessory)
                                                        <div class="form-check col-md-6">
                                                            
                                                            <input class="form-check-input" type="checkbox" name="value[{{$accessory->name ?? ''}}]" id="{{$accessory->name ?? ''}}">
                                                            <label class="form-check-label" for="{{$accessory->name ?? ''}}">
                                                                {{$accessory->name ?? ''}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="category_id" class="form-label">{{ $langg->lang103 }}</label>
                                                <select id="category_id" class="searchable-select input-field form-select"
                                                    name="category_id">
                                                    <option value="Select a Category" disabled selected>{{ $langg->lang104 }}
                                                    </option>
                                                    @foreach ($cats as $key => $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="brand_id" class="form-label">{{ $langg->lang114 }} *</label>
                                                <select class="form-select" id="brand_id" name="brand_id"
                                                    onchange="getModels(this.value)">
                                                    <option value="Select a Make" disabled selected>{{ $langg->lang115 }}
                                                    </option>
                                                    @foreach ($brands as $key => $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selectModels" class="form-label">{{ $langg->lang116 }}
                                                    *</label>
                                                <select class="form-select" id="selectModels" name="brand_model_id">

                                                    <option value="Select a model" disabled selected>{{ $langg->lang117 }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="mileage" class="form-label">{{ $langg->lang113 }} (km or Unknown)
                                                    *</label>
                                                <input type="bumber" class="form-control" id="mileage" name="mileage"
                                                    placeholder="1234">
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label for="chassis" class="form-label">VIN/Chassis *</label>
                                                <input type="text" class="form-control" id="chassis" name="chassis"
                                                    placeholder="VIN/Chassis">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="year" class="form-label">{{ $langg->lang112 }}*</label>
                                                <input type="number" class="form-control" id="year" name="year"
                                                    placeholder="e.g. 1999" min="1990">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="wovr_option" class="form-label">Is The Vehicle Listed On WOVR
                                                    </label>
                                                <select for="wovr_option" class="searchable-select form-control" name="wovr_option">
                                                    <option value="0"  selected>No</option>
                                                    <option value="1"  >Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="statutory_option" class="form-label">Statutory Or Repairable
                                                    *</label>
                                                <select for="statutory_option" class="searchable-select form-control" name="statutory_option">
                                                    <option value="0"  selected>No</option>
                                                    <option value="1"  >Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="key" class="form-label">Key</label>
                                                <select for="key" class="searchable-select form-control" name="car_key">
                                                    <option value="0"  selected>No</option>
                                                    <option value="1"  >Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cylender" class="form-label">Cylenders</label>
                                                <input type="text" class="form-control" id="cylender" name="cylender"
                                                    placeholder="cylenders">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="body_type_id" class="form-label">{{ $langg->lang118 }}
                                                    *</label>
                                                <select class="searchable-select form-control" name="body_type_id">
                                                    <option value="Select a brand" disabled selected>{{ $langg->lang119 }}
                                                    </option>
                                                    @foreach ($btypes as $key => $btype)
                                                        <option value="{{ $btype->id }}">{{ $btype->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="fuel_type_id" class="form-label">{{ $langg->lang120 }}</label>
                                                <select class="searchable-select form-control" name="fuel_type_id"
                                                    id="fuel_type_id">
                                                    <option value="Select a brand" disabled selected>{{ $langg->lang121 }}
                                                    </option>
                                                    @foreach ($ftypes as $key => $ftype)
                                                        <option value="{{ $ftype->id }}">{{ $ftype->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="transmission_type_id" class="form-label">{{ $langg->lang122 }}
                                                </label>
                                                <select class="searchable-select form-control" name="transmission_type_id"
                                                    id="transmission_type_id">
                                                    <option value="Select a brand" disabled selected>{{ $langg->lang123 }}
                                                    </option>
                                                    @foreach ($ttypes as $key => $ttype)
                                                        <option value="{{ $ttype->id }}">{{ $ttype->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="condtion_id" class="form-label">{{ $langg->lang124 }} *</label>
                                                <select class="searchable-select form-control" name="condtion_id"
                                                    id="condtion_id">
                                                    <option value="Select a brand" disabled selected>{{ $langg->lang125 }}
                                                    </option>
                                                    @foreach ($conditions as $key => $condition)
                                                        <option value="{{ $condition->id }}">{{ $condition->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="is_auction" value='1'>
                                            <div class="col-6">
                                                <label for="auction_time" class="form-label">{{ $langg->lang183 }} </label>
                                                <select class="form-control" name="auction_time" id="auction_time">
                                                    <option value="" selected>{{ $langg->lang184 }}</option>
                                                    <option value="{{ \Crypt::encrypt(1) }}">{{ $langg->lang185 }}
                                                    </option>
                                                    <option value="{{ \Crypt::encrypt(3) }}">{{ $langg->lang186 }}
                                                    </option>
                                                    <option value="{{ \Crypt::encrypt(7) }}">{{ $langg->lang187 }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="promotion_code" class="form-label">Promotional Code
                                                </label>
                                                <input type="text" class="form-control" id="promotion_code" name="promotion_code"
                                                    placeholder="ABCD">
                                                </select>
                                            </div>
                                            <!--
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                        class="btn btn-primary addProductSubmit-btn">{{ $langg->lang134 }}</button>
                                                </div>
                                            </div>
                                        -->
                                        </div>


                                    </div>


                                </div>

                            </div>
                            <!--end row-->
                            <input type="hidden" id="myfeaturedcarimg" name="featured_image" value="">
                            <div class="slider_images"></div>
                    </form>

                </div>

            </div>

        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Featured Image</h5>
                        <hr>
                        <form id="featuredimg" action="{{ route('user.car.uploadFeatured') }}" class="dropzone"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="dz-message">
                                <div class="font-22 text-primary"> <i class="lni lni-cloud-upload"></i>
                                </div>
                                Drop files here or click to upload.
                            </div>
                            <div class="fallback"><input type="file" name="image" /></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gallery Images </h5>
                        <hr>
                        <form id="galleryimg" action="{{ route('user.car.uploadgallery') }}" class="dropzone"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <div class="dz-message">
                                <div class="font-22 text-primary"> <i class="lni lni-cloud-upload"></i></div>
                                Drop files here or click to upload.
                            </div>
                            <div class="fallback"><input type="file" name="image" /></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                <div class="col-md-6"></div>
                <div class="col-md-6"><button id="savebtn" class="btn btn-primary addProductSubmit-btn"> Save </button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <!-- Old Data-->
    <script>
        $(document).on('click',"#savebtn",function(){
            $("#geniusform").submit();
        });
        function getModels(brandid) {
            var url = '{{ url('/') }}' + '/car/' + brandid + '/models';
            // console.log(url);
            $.get(url, function(data) {
                // console.log(data);
                var opts = `<option value="Select a model" disabled="" selected="">Select a model</option>`;
                for (var i = 0; i < data.length; i++) {
                    opts += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#selectModels").html(opts);
            })
        }

        var app = new Vue({
            el: '#app',
            data: {
                count: 0
            },
            methods: {
                addspec() {
                    this.count++;
                },
                subspec(n) {
                    $("#spec" + n).remove();
                },
                subexspec(n) {
                    $("#exspec" + n).remove();
                }
            }
        })
        function removeimg(e) {
            var id= e.target.getAttribute("data-val");
            console.log(id)
            $('#'+id).remove()
            
            $( e.target ).parents('.image').remove();
        }
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("form#featuredimg", {
            paramName: "image",
            maxFilesize: 10,
            uploadMultiple: false,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            forceFallback: false,
            init: function() {
                this.on("success", function(file, responseText) {
                    if (responseText.status == true) {
                        imgpath = "/assets/front/images/cars/featured/" + responseText.message;
                        $("input#myfeaturedcarimg").val(responseText.message);
                    }
                });
            }
        });

        var myDropzone = new Dropzone("form#galleryimg", {
            paramName: "image",
            maxFilesize: 10,
            uploadMultiple: false,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            forceFallback: false,
            init: function() {
                this.on("success", function(file, responseText) {
                    if (responseText.status == true) {
                        var html = '<input type="hidden" name="images[]" value="' + responseText.message + '">'
                        $(".slider_images").append(html);
                    }
                });
            },
        });
    </script>
@endsection
