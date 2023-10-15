<?php
$title = "Preview ";
$data = file_get_contents('res.txt');
$data = json_decode($data);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- ===================pdf button -->
    <button id="createpf" class="btn btn-danger">Create PDF</button>
    <!-- ===================pdf button -->
    <div id="content">
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <h1>hello</h1>
                </div>
    
            </div>
        </div>
    </div>
    </div>


    <script>
        let btn = document.getElementById('createpf');
        btn.addEventListener('click', () => {
            let contents = document.getElementById('content');
            const opt = {
                margin: 0,
                filename: 'Cvbuilder.pdf',
                html2canvas: {
                    scale: 1, // Set to 1 for 1:1 scale
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            }
            html2pdf().set(opt).from(contents).save();
        });
    </script>


</body>

</html>