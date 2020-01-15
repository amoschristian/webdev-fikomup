tinymce.init({
  selector: '.richtext',
  height: 200,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools responsivefilemanager"
    ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager",
  imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ],
   external_filemanager_path:"../plugin/filemanager/",
   filemanager_title:"File Manager" ,
   external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
});