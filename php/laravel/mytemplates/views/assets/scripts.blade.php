<!-- app.js -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- custom.js -->
<script src="{{ asset('js/custom.js') }}"></script>
<!-- jquery-ui.js -->
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!-- tinymce.min.js -->
<script src="{{ asset('js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        branding: false,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css']
    });
</script>
