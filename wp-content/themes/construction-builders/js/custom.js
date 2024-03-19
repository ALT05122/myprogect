jQuery(document).ready(function ($) {
    $(".site-header .form-holder .search-btn ,.site-header .form-holder .btn-form-close").on('click', function () {
        $(".site-header .form-holder form").slideToggle();
    });
   
});