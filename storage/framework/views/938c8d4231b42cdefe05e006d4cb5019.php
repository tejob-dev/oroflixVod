<script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" ></script>
 <!-- Datatable js -->
<script src="<?php echo e(url('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>

 <!-- Tagsinput js -->
<script src="<?php echo e(url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/bootstrap-tagsinput/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/detect.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/vertical-menu.js')); ?>"></script>
<!-- Switchery js -->
<script src="<?php echo e(url('assets/plugins/switchery/switchery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/custom/custom-switchery.js')); ?>"></script>
<!-- Apex js -->
<script src="<?php echo e(url('assets/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/apexcharts/irregular-data-series.js')); ?>"></script>    
<!-- Slick js -->
<script src="<?php echo e(url('assets/plugins/slick/slick.min.js')); ?>"></script>
<!-- Pnotify js -->
<script src="<?php echo e(url('assets/plugins/pnotify/js/pnotify.custom.min.js')); ?>"></script>
<!-- Select2 js -->
<script src="<?php echo e(url('assets/plugins/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/core.js')); ?>"></script>
<script src="<?php echo e(url('js/admin.js')); ?>"></script>
<script src="<?php echo e(url('js/encrpt.js')); ?>"></script>
<script src="<?php echo e(url('js/vimeo.min.js')); ?>"></script>
<script src="<?php echo e(url('js/youtube-videojs.min.js')); ?>"></script>
<script src="<?php echo e(url('vendor/midia/dropzone.js')); ?>"></script>
<script src="<?php echo e(url('vendor/midia/clipboard.js')); ?>"></script>
<script src="<?php echo e(url('vendor/midia/midia.js')); ?>"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="<?php echo e(url('assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(url('js/star-rating.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/jquery-bar-rating/jquery.barrating.min.js')); ?>"></script>
<script src="<?php echo e(url('js/bs-custom-file-input.js')); ?>"></script>
<script src="<?php echo e(url('js/bs-custom-file-input.min.js')); ?>"></script>
<script src="<?php echo e(url('js/custom-file-input.js')); ?>"></script>
<!-- Include toastr CSS and JavaScript files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script src="<?php echo e(url('/js/checkbox.js')); ?>"></script>
<script>
		
	function readURL(input) {

		if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#' + input.name).attr('src', e.target.result);
		}
		
		reader.readAsDataURL(input.files[0]);
		}
	}
	PNotify.desktop.permission();
	<?php if(session('warning')): ?>
		var warning = new PNotify( {
            title: 'Warning', text: '<?php echo e(session('warning')); ?>', type: 'primary', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
            }
    	});

    	warning.get().click(function() {
            warning.remove();
        });
	<?php endif; ?>

	<?php if(session('success')): ?>
		var success = new PNotify( {
	            title: 'Success', text: '<?php echo e(session('success')); ?>', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-up'
            }
	    });

	    success.get().click(function() {
            success.remove();
        });
	<?php endif; ?>

	<?php if(session('info')): ?>
		var info = new PNotify( {
	            title: 'Updated', text: '<?php echo e(session('info')); ?>', type: 'info', desktop: {
                desktop: true, icon: 'feather icon-info'
            }
	    });

	    info.get().click(function() {
            info.remove();
        });
	<?php endif; ?>

	<?php if(session('deleted')): ?>
		var deleted = new PNotify( {
		    title: 'Deleted', text: '<?php echo e(session('deleted')); ?>', type: 'error' , desktop: {
                desktop: true, icon: 'feather icon-trash-2'
            }
		});

		deleted.get().click(function() {
            deleted.remove();
        });
	<?php endif; ?>

	$('.select2').select2();

	( function($) {
	    $( "#datepicker" ).datepicker({
	    	changeMonth: true,
      		changeYear: true,
      		yearRange: '1950:<?php echo e(date('Y')); ?>',
      		dateFormat: "yy-mm-dd"
	    });
	})(jQuery);
	

</script>
<script>
  $(document).ready(function() {

    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
});
</script>
<<script>
    // offcanvas menu
    $(".menu-tigger").on("click", function () {
        $(".offcanvas-menu,.offcanvas-overly").addClass("active");
        return false;
    });
    $(".menu-close,.offcanvas-overly").on("click", function () {
        $(".offcanvas-menu,.offcanvas-overly").removeClass("active");
    });
</script>
<script>
    (function($) {
      $(document).ready(function(){
        $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#v-pills-tab a[href="' + activeTab + '"]').tab('show');
        }
      });
    })(jQuery);
</script>
<script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#' + input.name).attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
</script>
<script>
  $("#mytext").on('submit',function (e) {
  // alert('hello');
  console.log("data");
  e.preventDefault();
  $('.service_btn').text('Please Wait..');
  $('.service_btn').prop("disabled", true);
  var formData = new FormData();
  var a = formData.append('service', $("#service").val());
  var b = formData.append('language', $("#language").val());
  var c = formData.append('keyword', $("#keyword").val());
  var baseUrl = "<?php echo e(url('/')); ?>";
  var urlLike2 = baseUrl+'/openai/text'; 
  $.ajax({
      type: "post",
      url: urlLike2,
      data: formData,
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      contentType: false,
      processData: false,
      success: function (data) {
          console.log(data.status);
          if(data.status == false){
              //  alert(data.msg);
              $('.service_btn').text(data.msg);
              // $('.service_btn').prop("disabled", true);
                }
                else if(data){
              // toastr.success('Generated Successfully!');
              console.log(data.html);
              z = data.code;
              $(".generator_sidebar_table").html(data.html);
              
          } else {
              $('.service_btn').text('Generate');
              toastr.error( 'Your words limit has been exceeded.' );
          }
              // $('.service_btn').prop("disabled", false);
              // $('.service_btn').text('Generate');
      },
          error: function (data) {
            if (data && data.responseJSON && data.responseJSON.message) {
                var errorMessage = data.responseJSON.message;
                toastr.error("Your Api Key Has Been Expired");
            } else {
                toastr.error('An error occurred. Please try again later.');
            }
              console.log(data);
              $('.service_btnn').prop("disabled", false);
              $('.service_btn').text('Generate');            
           }
  });
});

  // Initialize toastr
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

function generatorFormImage(ev) {
'use strict';
      ev?.preventDefault();
ev?.stopPropagation();
      $('.generate-btn-text').text('Please Wait...');
      $('.generate-btn-text').prop("disabled", true);
      document.getElementById("image-generator").disabled = true;
      document.getElementById("image-generator").innerHTML = "Please Wait...";
document.querySelector('#app-loading-indicator')?.classList?.remove('opacity-0');
      var formData = new FormData();
      formData.append('image_number_of_images', $("#image_number_of_images").val());
      formData.append('description', $("#description").val());
      formData.append('size', $("#size").val());
      var baseUrl = "<?php echo e(url('/')); ?>";
      var urlLike = baseUrl+'/openai/image'; 
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          },
          type: "post",
          url: urlLike,
          data: formData,
          contentType: false,
          processData: false,
          success: function (data) {
              if(data.status == false){
              //  alert(data.msg);
              $('.generate-btn-text').text(data.msg);
              // $('.service_btn').prop("disabled", true);
                }
              else if(data.status=='True'){
                alert("hello");
                  setTimeout(function () {
                      $(".image-output").html(data.response);
                      document.getElementById("image-generator").disabled = false;
                      document.getElementById("image-generator").innerHTML = "Regenerate";
                      document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
                      $('.generate-btn-text').text('Generate');
                  }, 750);
              } else {
                  $('.generate-btn-text').text('Generate');
                  toastr.error("Your Api Key Has Been Expired");
                  // toastr.error('Your image limit has been exceeded.');
              }
          },
          error: function (data) {
            console.log(data);
            if (data && data.responseJSON && data.responseJSON.message) {
                var errorMessage = data.responseJSON.message;
                toastr.error("Your Api Key Has Been Expired");
            } else {
                toastr.error('An error occurred. Please try again later.');
            }
           }
      });
      return false;
  }
</script>

<script>
(function($) {
"use strict";
  $(document).ready(function(){
    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#v-pills-tab a[href="' + activeTab + '"]').tab('show');
    }
  });
})(jQuery);

// 
function createSlug(input) {
    return input
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^a-z0-9-]/g, "");
}
$("#title").on("input", function () {
    const headingValue = $(this).val();
    const slugValue = createSlug(headingValue);
    $("#slug").val(slugValue);
});
// 

// ----------script space in - show code start--------------------
const inputElements = document.getElementsByClassName("custom-input");

for (let i = 0; i < inputElements.length; i++) {
    inputElements[i].addEventListener("input", function () {
        const inputValue = this.value;
        const slugValue = inputValue.replace(/\s+/g, "-");
        this.value = slugValue;
    });
}
// ----------script space in - show code end--------------------



</script>

<!-- End js -->
<?php echo $__env->yieldContent('script'); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/layouts/scripts.blade.php ENDPATH**/ ?>