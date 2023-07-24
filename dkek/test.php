
<!DOCTYPE html>
<html>
<head>
    <title>Local PDF Viewer</title>
    <style>
        #pdf-container {
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body>
    <div id="pdf-container"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // Path to the PDF file
        var pdfPath = 'assets/file.pdf';

        // Initialize the PDF viewer
        PDFJS.getDocument(pdfPath).promise.then(function(pdf) {
            // Fetch the first page
            pdf.getPage(1).then(function(page) {
                var scale = 1.5;
                var viewport = page.getViewport({ scale: scale });

                // Prepare the canvas element
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                document.getElementById('pdf-container').appendChild(canvas);

                // Render the page content on the canvas
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        });
    </script>
</body>
</html>
