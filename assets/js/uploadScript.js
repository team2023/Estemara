function handleFileUpload(inputId, spanId) {
  const formFileInput = document.getElementById(inputId);
  const fileNameSpan = document.getElementById(spanId);

  formFileInput.addEventListener("change", function () {
    if (formFileInput.files.length === 1) {
      fileNameSpan.innerText = formFileInput.files[0].name;
    } else {
      fileNameSpan.innerText = "";
    }
  });
}

handleFileUpload("formFile1", "fileName1");
handleFileUpload("formFile2", "fileName2");
handleFileUpload("formFile3", "fileName3");
