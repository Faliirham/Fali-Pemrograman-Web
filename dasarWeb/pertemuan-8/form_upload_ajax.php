<!DOCTYPE html>
<html>
    <head>
        <title>Unggah File Dokumen</title>
    </head>
    <body>
        <form id ="upload-form" action="upload_ajax.php" method="post" 
        enctype="multipart/form-data">
        <input type="file" name="files[]" id="file" multiple accept=".jpeg, .jpg, .png, .gif, .pdf, .doc, .docx, .txt">
        <input type="submit" name="submit" value="Unggah">
    </form>
    <div id="status"></div>

    <script src="https://code.jquerry.com/jquerry-3.6.0.min.js"></script>
    <script src="upload.js"></script>
    </body>
</html>