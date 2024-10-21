<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $extensions_images = array("jpeg", "jpg", "png", "gif"); 
    $extensions_docs = array("pdf", "doc", "docx", "txt"); 
    $doc_count = 0; 

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        @$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        
        if (in_array($file_ext, $extensions_images)) {
            if ($file_size > 2097152) {
                $errors[] = "Ukuran file gambar '$file_name' tidak boleh lebih dari 2MB.";
            } else {
                move_uploaded_file($file_tmp, "images/" . $file_name);
                echo "File gambar '$file_name' berhasil diunggah.<br>";
            }
        }
        
        elseif (in_array($file_ext, $extensions_docs)) {
            $doc_count++;
            if ($doc_count > 1) {
                $errors[] = "Hanya satu dokumen yang dapat diunggah.";
            } elseif ($file_size > 2097152) {
                $errors[] = "Ukuran file '$file_name' tidak boleh lebih dari 2MB.";
            } else {
                move_uploaded_file($file_tmp, "documents/" . $file_name);
                echo "File dokumen '$file_name' berhasil diunggah.<br>";
            }
        }
        
        else {
            $errors[] = "Ekstensi file '$file_name' tidak diizinkan.";
        }
    }

    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }
}
?>