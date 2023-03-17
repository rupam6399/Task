$(document).ready(function() {
    $('#employeeData').DataTable({
        "paging": true,
        "pageLength": 10,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });

});