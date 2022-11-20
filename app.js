let uploadInput = document.getElementById("fileUpload");
let uploadedFilename = document.getElementById("uploadedFilename");
let submitUpload = document.getElementById("submitUpload");

uploadInput.addEventListener("change", () => {
    let files = uploadInput.files;
    let filename = "";
    if(files.length > 0) {
        filename = files[0].name;
        uploadedFilename.innerHTML = filename;
        submitUpload.classList.remove("is-hidden");
    }
    else {
        return;
    }
});

