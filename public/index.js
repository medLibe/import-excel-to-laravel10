$(document).ready(function() {
    $('#formUpload').on('change', function() {
        let fileInput = document.getElementById('formUpload');
        let file = fileInput.files[0];
        let _token = $('#token').val();
        let formData = new FormData();
        formData.append('file_excel', file);
        formData.append('_token', _token);

        $.ajax({
            url: '/upload',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                let data = response.data;
                let tableHead = '<thead><tr>';
                for(let i = 0; i < data[0].length; i++){
                    tableHead += '<th>' + data[0][i] + '</th>';
                }
                tableHead += '</tr></thead>';


                // show tbody
                let tableBody = '<tbody>';
                for(let x = 1; x < data.length; x++){
                    tableBody += '<tr>';
                    for(let y = 0; y < data[x].length; y++){
                        tableBody += '<td>' + data[x][y] + '</td>';
                    }
                    tableBody += '</tr>';
                }
                tableBody += '</tbody';

                let tableHTML = tableHead + tableBody;

                $('#data').html(tableHTML);
                let convertToDatatable = $('#data').DataTable({
                    dom: 'Brftip',
                    buttons: [
                        'print',
                        'pdf',
                        'csv'
                    ]
                });

                convertToDatatable.buttons().container()
                .appendTo( $('.col-sm-6 mx-1:eq(0)', convertToDatatable.table().container() ) );
            },
            error: function(xhr, status, error){
                if(xhr.status == 400){
                    let errResponse = JSON.parse(xhr.responseText);
                    let responseMessage = errResponse.error.file_excel[0];
                    const toastError = document.getElementById('toastMessage');
                    const toastErrorBody = document.getElementById('toastMessageBody');

                    toastError.classList.add('show');
                    toastError.classList.add('text-bg-danger');
                    toastErrorBody.innerHTML = responseMessage;
                }
            }
        })
    });
});
