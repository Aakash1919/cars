@extends('layouts.load')

@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')
                      <form id="geniusformdata" action="{{route('user-gal-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-8 offset-lg-2">
                            <div class="row">

                              <div class="col-md-12 text-center">
                                <div id="upload-demo">

                                </div>
                              </div>

                              <div class="col-md-6 offset-md-3 mb-1">
                                <span class="file-btn"><input type="file" id="image" accept="image/*"><span class="txt">Choose Image</span></span>
                              </div>


                              <div class="col-md-6 offset-md-3">
                                <button class="btn btn-primary btn-block upload-image mt-2 py-2" style="background-color: #1f224f;">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection

@section('scripts')
  <script type="text/javascript">


  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  });


  var resize = $('#upload-demo').croppie({

      enableExif: true,
      enableOrientation: true,
      // enableResize: true,
      enableZoom: true,
      viewport: {

          width: 650,

          height: 305,

          type: 'square'

      },

      boundary: {

          width: 745,

          height: 390

      }

  });

  var file = '';

  $('#image').on('change', function () {

    var reader = new FileReader();

      reader.onload = function (e) {

        resize.croppie('bind',{

          url: e.target.result

        }).then(function(){

          console.log('jQuery bind complete');

        });

      }

      reader.readAsDataURL(this.files[0]);
      file = this.files[0];
  });



  $('.upload-image').on('click', function (ev) {
    $('.submit-loader').show();
    $('button.addProductSubmit-btn').prop('disabled',true);

    resize.croppie('result', {

      type: 'canvas',

      size: 'viewport'

    }).then(function (img) {
      if (file.length == 0) {
        img = '';
      }
      $.ajax({

        url: "{{route('user-gal-store')}}",

        type: "POST",

        data: {"image":img},

        success: function (data) {
          console.log(data);

          if ((data.errors)) {
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>');
            }
            $('.submit-loader').hide();
            $("#modal1 .modal-content .modal-body .alert-danger").focus();
            $('button.addProductSubmit-btn').prop('disabled',false);
            $('#geniusformdata input , #geniusformdata select , #geniusformdata textarea').eq(1).focus();
          }
          else
          {
            table.ajax.reload();
            $('.alert-success').show();
            $('.alert-success p').html(data);
            $('.submit-loader').hide();
            $('button.addProductSubmit-btn').prop('disabled',false);
            $('#modal1,#modal2').modal('toggle');

           }
        }

      });

    });

  });
  </script>
@endsection
