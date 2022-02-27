<html>
 <head>
  <title>How to use Tabledit plugin with jQuery Datatable in PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        .table thead,
        .table th 
        {
            text-align: center;
            font-size: 11px;
        }
        .table td {
            text-align: center;
            font-size: 11px;
        }
    </style>
</head>
 <body>
  <div class="">
   <br />
   <div class="panel panel-default">
    <div class="panel-body">
     <div class="table-responsive">
      <table id="sample_data" class="table table-bordered table-striped" style="width:100%; padding:10px ">
       <thead>
        <tr>
            <th colspan="2">User</th>
            <th colspan="8">Project Management</th>
            <th colspan="5">KPI</th>
            <th colspan="2">Project</th>
            <th colspan="2">Client Management</th>
            <th colspan="2">Client Booked</th>
            <th colspan="1">Factory Management</th>
            <th colspan="1">Supplier Management</th>
            <th colspan="3">User Management</th>
            <th colspan="1">Buttons</th>
        </tr>
        <tr>
            <th>Edit</th>
            <th>Username</th>
            <th>Summary</th>
            <th>View List</th>
            <th>Edit List</th>
            <th>Copy List</th>
            <th>Track List</th>
            <th>Cancel List</th>
            <th>Calendar</th>
            <th>Download</th>
            <th>Jobs</th>
            <th>Inspector</th>
            <th>Report</th>
            <th>Report Team</th>
            <th>Booking</th>
            <th>New Project</th>
            <th>Project Template</th>
            <th>New Client</th>
            <th>View/Edit</th>
            <th>TIC</th>
            <th>Sera</th>
            <th></th>
            <th></th>
            <th>User</th>
            <th>Inspector</th>
            <th>Sales manager</th>
            <th>Action</th>
        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

    var token = "{{csrf_token()}}";
    var auth_id = "{{Auth::id()}}";

    var myTable = $('#sample_data').DataTable({
            "scrollY": true,
            "scrollX": true,
            "scrollCollapse": true,
            "fixedColumns":   {
                "left": 1,
                "left": 0,
            },
            "order": [
                    [1, "asc"]
            ],
            "processing" : true,
            "serverSide" : true,
            "stateSave": true,
            "ajax" : {
                url:"{{ url('userprivelege-get-data') }}",
                type:"POST",
                "data": {
                    _token: "{{csrf_token()}}"
                }
            },
            "columns": [
                { 
                    "data": "user_id",
                    "orderable": false
                },
                { "data": "username" },
                { 
                    "data": "summary", 
                    "orderable": false
                },
                { 
                    "data": "view_list", 
                    "orderable": false
                },
                { 
                    "data": "edit_list", 
                    "orderable": false
                },
                { 
                    "data": "copy_list", 
                    "orderable": false
                },
                { 
                    "data": "track_list", 
                    "orderable": false
                },
                { 
                    "data": "cancel_list", 
                    "orderable": false
                },
                { 
                    "data": "calendar", 
                    "orderable": false
                },
                { 
                    "data": "download", 
                    "orderable": false
                },
                { 
                    "data": "kpi_jobs", 
                    "orderable": false
                },
                { 
                    "data": "kpi_inspector", 
                    "orderable": false
                },
                { 
                    "data": "kpi_report", 
                    "orderable": false
                },
                { 
                    "data": "kpi_report_team", 
                    "orderable": false
                },
                { 
                    "data": "kpi_booking", 
                    "orderable": false
                },
                { 
                    "data": "new_project", 
                    "orderable": false
                },
                { 
                    "data": "project_template", 
                    "orderable": false
                },
                { 
                    "data": "client_new", 
                    "orderable": false
                },
                { 
                    "data": "client_viewedit", 
                    "orderable": false
                },
                { 
                    "data": "client_tic", 
                    "orderable": false
                },
                { 
                    "data": "client_ticsera", 
                    "orderable": false
                },
                { 
                    "data": "factory", 
                    "orderable": false
                },
                { 
                    "data": "supplier", 
                    "orderable": false
                },
                { 
                    "data": "user", 
                    "orderable": false
                },
                { 
                    "data": "inspector", 
                    "orderable": false
                },
                { 
                    "data": "sales", 
                    "orderable": false
                },
                { 
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ],
            "columnDefs" : [
                {
                    "targets": 0,
                    'createdCell': function(td, cellData, rowData, row, col) {
                        // $(td).attr('id', cellData);
                    }
                }
            ]
    });


    $(document).on('blur', '.column_name', function(){
        var column_name = $(this).attr("id");
        var column_value = $(this)[0].checked === true?'Yes':'No';
        // var titles = $( myTable.column( myTable.cell( this ).index().column ).header() ).html();
        var id = $(this).closest('tr').find("td:eq(0)").html(); 
        // console.log(column_name);

        // tabledit.update

        if(column_value != '')
        {
            $.ajax({
                url:"{{ route('userprivelege-update') }}",
                method:"POST",
                data:{column_name:column_name, column_value:column_value, id:id, _token:token},
                success:function(data)
                {
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: column_name + ' changed!',
                    showConfirmButton: false,
                    timer: 1000
                    })
                }
            })
        }
        else
        {
            $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
        }


        // Swal.fire({
        // position: 'top-end',
        // icon: 'success',
        // title: id + ' changed!',
        // showConfirmButton: false,
        // timer: 1000
       
    });


    

    // function addCheckbox(name) {
    //         $(name).prop('type', 'checkbox');           

    //         if ($(name).val() == "Yes") {
    //             $(name).prop("checked", "checked");
    //         }
    //         else {
    //             $(name).prop("checked", ""); 
    //             $(name).checked = false;
    //         }

    //         $(name).change(function () {
    //             $(this).val(this.checked);
    //             $(this).siblings("span").text(this.checked);
    //         });
    // }

    // $('#sample_data').on('draw.dt', function(){
    //     $('#sample_data').Tabledit({
            

    //         url:'{{ route("tabledit.action") }}',
    //         dataType:'json',
    //         columns:{
    //             identifier : [0, 'id'],
    //             editable:
    //             [
    //                 [1, 'first_name'], 
    //                 [2, 'last_name'], 
    //                 [3, 'gender', '{"1":"Male","2":"Female"}'],
    //                 [4, 'checkmark']
    //             ]
    //         },
    //         restoreButton:false,
    //         onSuccess:function(data, textStatus, jqXHR)
    //         {
    //             if(data.action == 'delete')
    //             {
    //             $('#' + data.id).remove();
    //             $('#sample_data').DataTable().ajax.reload();
    //             }
    //         },
    //         onDraw: function () {                    
    //                 $('table tr td:nth-child(4) input').each(function () {
    //                     addCheckbox($(this));      
    //                 });
    //         }
    //     });
    // });
  
}); 
</script>
