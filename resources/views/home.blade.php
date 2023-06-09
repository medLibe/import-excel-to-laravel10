<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import & Export Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/index.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">IOE App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <a href="" class="nav-link active">Home</a>
                </ul>
            </div>
        </div>
    </nav>

    <section class="content">
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form>
                        <div class="containerUpload mb-3">
                            <label>Upload File Excel</label>
                            <input type="hidden" id="token" value="{{ csrf_token() }}" readonly>
                            <input type="file" id="formUpload" placeholder="Select Excel File">
                            <button><i class="fa-solid fa-upload"></i></button>
                        </div>
                    </form>

                    {{-- <div class="buttonChoice">
                        <button class="me-2 button button-empty"><i class="fa-solid fa-rotate-right"></i></button>
                        <button class="me-2 button button-error"><i class="fa-solid fa-print"></i></button>
                        <button class="me-2 button button-pass"><i class="fa-solid fa-download"></i></button>
                    </div> --}}
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <table class="table table-bordered table-striped" id="data"></table>
                </div>
            </div>
        </div>

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast align-items-center border-0" id="toastMessage">
                <div class="d-flex">
                    <div class="toast-body" id="toastMessageBody">

                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
    <script src="/index.js"></script>
</body>

</html>
