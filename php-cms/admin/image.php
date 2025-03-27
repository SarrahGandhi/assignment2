<?php
// Set content type to image
header('Content-Type: image/jpeg'); // Or other formats based on the 'format' query parameter

// Retrieve the query parameters
$RecipeID = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$width = isset($_GET['width']) ? (int) $_GET['width'] : 300;
$height = isset($_GET['height']) ? (int) $_GET['height'] : 300;
$format = isset($_GET['format']) ? $_GET['format'] : 'inside'; // 'inside' or 'outside' for resizing logic

// Include database connection
include('includes/database.php');

// Fetch the image file path from the database
$query = "SELECT Photo FROM Recipes WHERE RecipeID = $RecipeID";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

// Ensure the image path is found
if ($row && isset($row['Photo']) && !empty($row['Photo'])) {
    $imagePath = 'uploads/' . $row['Photo'];

    if (file_exists($imagePath)) {
        // Load the image
        $image = imagecreatefromjpeg($imagePath);

        // Get the original image dimensions
        list($origWidth, $origHeight) = getimagesize($imagePath);

        // Calculate the new dimensions based on 'inside' or 'outside' resizing logic
        if ($format == 'inside') {
            // Maintain aspect ratio, ensuring the image fits within the specified dimensions
            $ratio = min($width / $origWidth, $height / $origHeight);
            $newWidth = (int) ($origWidth * $ratio);
            $newHeight = (int) ($origHeight * $ratio);
        } else {
            // Resize the image to fit exactly within the specified dimensions
            $newWidth = $width;
            $newHeight = $height;
        }

        // Create a new true color image with the new dimensions
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Resample the original image into the new image with the new dimensions
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        // Output the image to the browser
        imagejpeg($newImage);

        // Free memory
        imagedestroy($image);
        imagedestroy($newImage);
    } else {
        // Handle case where the image doesn't exist
        header('HTTP/1.0 404 Not Found');
        echo 'Image not found.';
    }
} else {
    // Handle case where no image is found for the given RecipeID
    header('HTTP/1.0 404 Not Found');
    echo 'Recipe image not found.';
}
?>