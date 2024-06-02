<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cover_letter = $_POST['cover_letter'];
    $cv = $_FILES['cv'];

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($cover_letter) && !empty($cv)) {
        // Handle file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($cv["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a real CV (for example, checking file type)
        $allowedTypes = ['pdf', 'doc', 'docx'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Sorry, only PDF, DOC & DOCX files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($cv["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($cv["name"])). " has been uploaded.";
                // Save other form data to database or send via email
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>
