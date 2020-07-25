tinymce.init({
  selector: '.richtext',
  height: 400,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
  imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//www.tinymce.com/css/codepen.min.css'
  ]
});