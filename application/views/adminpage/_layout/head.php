<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Halaman Administrator Upana Studio</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="google-site-verification" content="iMpeSevexHHO1DCIfI-WF4pN8yx7_yxMSFLw5wDkb6Y" />

    <link rel="stylesheet" type="text/css" href="<?=admin_assets()?>css/bootstrap-fileupload.min.css" />
    <link href="<?=admin_assets()?>plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/imagemanager/imagemanager.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/nestable.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/animate.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/style.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/theme/blue.css" rel="stylesheet" id="theme" />
    <link href="<?=admin_assets()?>plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/jqgrid_bootstrap/jquery-ui-1.10.2.custom.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/jqgrid-bootstrap/ui.jqgrid.css" rel="stylesheet" id="theme" />
    <link href="<?=admin_assets()?>css/validationEngine.css" rel="stylesheet"  />
    <link href="<?=admin_assets()?>css/custom.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=admin_assets()?>css/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

    <script src="<?=admin_assets()?>plugins/pace/pace.min.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>ckeditor/ckeditor.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?=admin_assets()?>plugins/select2/dist/js/select2.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script> -->
    <script src="<?=admin_assets()?>ckfinder/ckfinder.js"></script>
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
            //             uploadUrl: '<?=admin_assets()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',

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
        var admin_url = "<?=admin_url()?>/";
        var link_checked = false;
        var imagemanager_url = "<?=upload_url('imagemanager')?>";
        var this_controller= "<?=$this->uri->segment(2)?>";
        var im=0;
    </script>
    <script type="text/javascript" src="<?=admin_assets()?>js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>js/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>plugins/jqgrid-bootstrap/grid.locale-en.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>plugins/jqgrid-bootstrap/jquery.jqGrid.min.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>js/script.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>js/mygrid.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>js/notify.min.js"></script>
    <script type="text/javascript" src="<?=admin_assets()?>js/bootstrap-fileupload.min.js"></script>
    <!-- <script language="JavaScript" src="<?=admin_assets()?>js/ddi.js"></script> -->
    <script src="<?=admin_assets()?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script language="JavaScript" src="<?=admin_assets()?>plugins/imagemanager/imagemanager.js"></script>
    <script src="<?=admin_assets()?>plugins/sparkline/jquery.sparkline.js"></script>
    <script src="<?=admin_assets()?>js/dashboard.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136362562-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-136362562-1');
    </script>
<?php if ($this->session->flashdata('sukses')) { ?>
    <script>$(document).ready(function(){ notify('<?=$this->session->flashdata('sukses')?>', 'success'); });</script>
<?php } if ($this->session->flashdata('gagal')) { ?>
    <script>$(document).ready(function(){ notify('<?=$this->session->flashdata('gagal')?>', 'error'); });</script>
<?php } ?>
</head>
<body>
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
