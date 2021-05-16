(function($) {
		"use strict";

	$(document).ready(function() {


function disablekey()
{
 document.onkeydown = function (e)
 {
  return false;
 }
}

function enablekey()
{
 document.onkeydown = function (e)
 {
  return true;
 }
}

// **************************************  AJAX REQUESTS SECTION *****************************************


  // Status Start
      $(document).on('click','.status',function () {
        var link = $(this).attr('data-href');
            $.get( link, function(data) {
              }).done(function(data) {
                  table.ajax.reload();
                  $('.alert-danger').hide();
                  $('.alert-success').show();
                  $('.alert-success p').html(data);
            })
          });
  // Status Ends


  // Display Subcategories
      $(document).on('change','#cat',function () {
        var link = $(this).find(':selected').attr('data-href');
        if(link != "")
        {
          $('#subcat').load(link);
          $('#subcat').prop('disabled',false);
        }
      });
  // Display Subcategories Ends

  // Display Subcategories
      $(document).on('change','#subcat',function () {
        var link = $(this).find(':selected').attr('data-href');
        if(link != "")
        {
          $('#childcat').load(link);
          $('#childcat').prop('disabled',false);
        }
      });
  // Display Subcategories Ends

  // Droplinks Start
      $(document).on('change','.droplinks',function () {
        var link = $(this).val();
        var data = $(this).find(':selected').attr('data-val');
        if(data == 0)
        {
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-success drop-warning").addClass("drop-danger");
        } else if (data == 2) {
					$(this).next(".nice-select.process.select.droplinks").removeClass("drop-success drop-danger").addClass("drop-warning");
				}
        else{
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-danger drop-warning").addClass("drop-success");
        }
        $.get(link);

      });

      $(document).on('change','.data-droplinks',function () {
        $('.gocover').show();
        var link = $(this).val();
        $.get(link, function( data ) {
            table.ajax.reload();
            $('.alert-success').show();
            $('.alert-success p').html(data);
            $('.gocover').hide();
        });
      });


  // Droplinks Ends



// ADD OPERATION

$(document).on('click','#add-data',function(){
  $('.submit-loader').show();
  $('#modal1').find('.modal-title').html('ADD NEW '+$('#headerdata').val());
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      $('.submit-loader').hide();
    });
});

// ADD OPERATION END



// EDIT OPERATION

$(document).on('click','.edit',function(){
  $('.submit-loader').show();
  $('#modal1').find('.modal-title').html('EDIT '+$('#headerdata').val());
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      $('.submit-loader').hide();
    });
});


// EDIT OPERATION END


// FEATURE OPERATION

$(document).on('click','.feature',function(){
  $('.submit-loader').show();
  $('#modal2').find('.modal-title').html($('#headerdata').val()+' Highlight');
  $('#modal2 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      $('.submit-loader').hide();
    });
});


// EDIT OPERATION END


// SHOW OPERATION

$(document).on('click','.view',function(){
  $('.submit-loader').show();
  $('#modal1').find('.modal-title').html($('#headerdata').val()+' DETAILS');
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      $('.submit-loader').hide();
    });
});


// SHOW OPERATION END



// ADD / EDIT FORM SUBMIT FOR DATA TABLE


$(document).on('submit','#geniusformdata',function(e){
  e.preventDefault();
  $('.submit-loader').show();
  $('button.addProductSubmit-btn').prop('disabled',true);
  disablekey();
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
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
          enablekey();
       }

      });

});


// ADD / EDIT FORM SUBMIT FOR DATA TABLE ENDS



// DELETE OPERATION

      $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });

      $('#confirm-delete .btn-ok').on('click', function(e) {

        $.ajax({
         type:"GET",
         url:$(this).attr('href'),
         success:function(data)
         {
              $('#confirm-delete').modal('toggle');
              table.ajax.reload();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success p').html(data);
         }
        });
        return false;
      });

      $('#confirm-delete1 .btn-ok').on('click', function(e) {

        $.ajax({
         type:"GET",
         url:$(this).attr('href'),
         success:function(data)
         {
              $('#confirm-delete1').modal('toggle');
              table.ajax.reload();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success p').html(data);
         }
        });
        return false;
      });

// DELETE OPERATION END

	});



// NORMAL FORM

$(document).on('submit','#geniusform',function(e){
  e.preventDefault();
  $('.gocover').show();
  $('button.addProductSubmit-btn').prop('disabled',true);
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
				 	console.log(data);
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
							let flag = 0;
							$('.alert-danger ul li').each(function() {
								if ($(this).text() == data.errors[error]) {
									flag = 1;
								}
							});
							if (flag == 1) {
								continue;
							}
              $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>')
            }
            $('#geniusform input , #geniusform select , #geniusform textarea').eq(1).focus();
          }
          else
          {
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html(data);
						$('#geniusform input , #geniusform select , #geniusform textarea').eq(1).focus();
						$('.add-form#geniusform').trigger("reset");
						if ($(".add-form .nic-edit").length > 0) {
							$(".add-form .nic-edit").each(function() {
								nicEditors.findEditor( $(this).attr('id') ).setContent( '' );
							});
						}
						if ($(".add-form #uploadedImages").length > 0) {
							$(".add-form #uploadedImages").html('');
						}
						if ($(".add-form .featured-image .span4.cropme img").length > 0) {
							$(".add-form .featured-image .span4.cropme").html('');
						}
						if ($(".add-form .searchable-select").length > 0) {
							$(".add-form .searchable-select").each(function() {
								$(this).select2("val", "");
							});
						}
						if ($(".add-form .searchable-select").length > 0) {
							$('.add-form .select2-selection__rendered').html("");
						}
          }
          $('.gocover').hide();
          $('button.addProductSubmit-btn').prop('disabled',false);
       }

      });

});

// NORMAL FORM ENDS


// LOGIN FORM

$("#loginform").on('submit',function(e){
  e.preventDefault();
  $('button.submit-btn').prop('disabled',true);
  $('.alert-info').show();
  $('.alert-info p').html($('#authdata').val());
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-info').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger p').html(data.errors[error]);
            }
          }
          else
          {
            $('.alert-info').hide();
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html('Success !');
            window.location = data;
          }
          $('button.submit-btn').prop('disabled',false);
       }

      });

});


// LOGIN FORM ENDS


// FORGOT FORM

$("#forgotform").on('submit',function(e){
  e.preventDefault();
  $('button.submit-btn').prop('disabled',true);
  $('.alert-info').show();
  $('.alert-info p').html($('#authdata').val());
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-info').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger p').html(data.errors[error]);
            }
          }
          else
          {
            $('.alert-info').hide();
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html(data);
            $('input[type=email]').val('');
          }
          $('button.submit-btn').prop('disabled',false);
       }

      });

});


// FORGOT FORM ENDS


// **************************************  AJAX REQUESTS SECTION ENDS *****************************************


})(jQuery);
