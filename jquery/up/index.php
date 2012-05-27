<html>
<head>
<link type="text/css" href="uploadify.css" rel="stylesheet" />
<script type="text/javascript" src="jquery.uploadify-3.1.js"></script>
<script type="text/javascript" src="jquery.uploadify-3.1.min.js"></script>

<script>
  $(document).ready(function(){
    $("#file_upload").uploadify({
      "uploader":"uploadify.swf",
      "script":"uploadify.php",
      "cancelImg":"uploads",
      "auto": true,
      "multi": true,
      "queuSizeLimit": 2
    });
  });
</script>

</head>

<body>

<form id="formUp" name="formUp" action="">
<input type="file" id="file_upload" name="file_upload" />
</form>

</body>
</html>
