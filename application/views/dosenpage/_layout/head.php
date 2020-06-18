<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?=$title?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<script>
        $(document).ready(function() {
            App.init();
            Dashboard.init();
            $('select').select2({
                createTag: function (params) {
                    // Don't offset to create a tag if there is no @ symbol
                    if (params.term.indexOf('@') === -1) {
                      // Return null to disable tag creation
                      return null;
                    }

                    return {
                      id: params.term,
                      text: params.term
                    }
                },
                insertTag: function (data, tag) {
                    // Insert the tag at the end of the results
                    data.push(tag);
                },
                placeholder: "Pilih"
            });

            // ClassicEditor
            //     .create( document.querySelector( '#ckeditor' ), {
            //         // plugins: [CKFinder],

            //         // Enable the CKFinder button in the toolbar.
            //         toolbar: [ 'ckfinder' ],

            //         ckfinder: {
            //             // Upload the images to the server using the CKFinder QuickUpload command.
            //             uploadUrl: '<?=dosen_assets()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',

            //             // Define the CKFinder configuration (if necessary).
            //             options: {
            //                 resourceType: 'Images'
            //             }
            //         }
            //     } )
            //     .then( editor => {
            //         console.log( editor );
            //     } )
            //     .catch( error => {
            //         console.error( error );
            //     } );
        });
        var admin_name = "<?=$this->session->fullname?>";
        var admin_img_link = "<?=upload_url('userpics').(empty($this->session->foto) ? 'no_image.jpg' : $this->session->foto)?>";
        var page_name = "<?=$title?>";
        var ai = "1";
        var au = "1";
        var ad = "1";
        var base_url = "<?=site_url()?>";
        var admin_url = "<?=dosen_url()?>/";
        var link_checked = false;
        var imagemanager_url = "<?=upload_url('imagemanager')?>";
        var this_controller= "<?=$this->uri->segment(2)?>";
        var im=0;
    </script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="<?=dosen_assets()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?=dosen_assets()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=dosen_assets()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?=dosen_assets()?>custom\assets\img\elektro-id.png" />
    <link href="<?=dosen_assets()?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="<?=dosen_assets()?>plugins/imagemanager/imagemanager.css" rel="stylesheet" />

		<!--custom css-->
		<link href="<?=dosen_assets()?>custom/style/custom.css" rel="stylesheet" type="text/css" />
	</head>