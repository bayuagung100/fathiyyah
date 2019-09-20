
tinymce.init({
    selector: '.richtext',
    height: 500,
    // link_list: "json/link-list.php",
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount responsivefilemanager'
    ],
    toolbar: 'insertfile undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | responsivefilemanager | link ',
    content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tiny.cloud/css/codepen.min.css'
    ],
    external_filemanager_path: "../vendor/filemanager/",
    filemanager_title: "File Manager",
  });

  // tinymce.init({
  //   selector: '.deskripsi',
  //   height: 300,
  //   plugins: [
  //     'advlist autolink lists link charmap print preview anchor',
  //     'searchreplace visualblocks code fullscreen',
  //     'insertdatetime table paste code help wordcount'
  //   ],
  //   toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link ',
  //   content_css: [
  //     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  //     '//www.tiny.cloud/css/codepen.min.css'
  //   ],
  // });