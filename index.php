<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="bulma.min.css">
    </head>
    <body>
        <div class="container is-flex is-flex-direction-column is-align-items-center">
            <div class="is-size-2 mt-4">FileUploader</div> 
            <div class="is-size-4">Share your Files online.</div>
            
            <form method="post" action="upload.php" enctype="multipart/form-data" class="is-flex is-flex-direction-column">
                <div class="file mt-4">
                    <label class="file-label">
                        <input type="file" class="file-input" name="fileUpload" id="fileUpload">
                        <span class="file-cta">
                            <span class="file-icon">
                                <img src="assets/upload.svg" alt="upload icon">
                            </span>
                            <span class="file-label">
                                Select file...
                            </span>
                        </span>
                    </label>
                </div>
                <button class="button is-primary mt-2 is-hidden" id="submitUpload" type="submit" name="submit">Upload</button>    
            </form>
            
            <p class="is-size-3 mt-4" id="uploadedFilename">
                <!-- Filename -->
            </p>
        </div>
        <script src="app.js"></script>
    </body>
</html>