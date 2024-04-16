<!-- create page that has a form to allow the user to upload a logo -->
<?php
$title = 'Upload Logo';
require 'include/header.php';
?>
<!--form to upload logo -->
<main class="container">
    <h1>Upload Logo</h1>
    <form method="post" action="save-logo.php" enctype="multipart/form-data">
        <fieldset class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" name="logo" id="logo" />
        </fieldset>
        <div class="offset-3">
            <button class="btn btn-primary">Upload</button>
        </div>
    </form>
</main>
</body>
</html>
