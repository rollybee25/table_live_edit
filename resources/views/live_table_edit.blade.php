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
 </head>
 <body>
  <div class="container">
   <h3 align="center">How to use Tabledit plugin with jQuery Datatable in PHP Ajax</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Sample Data</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="sample_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Gender</th>
         <th>Checkmark</th>
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

    var simple_checkbox = function ( data, type, full, meta ) {
        var is_checked = data == "Yes" ? "checked" : "";
        return '<input type="checkbox" class="checkbox" ' +
            is_checked + ' />';
    }

    var myTable = $('#sample_data').DataTable({
            "order": [
                    [0, "asc"]
            ],
            "processing" : true,
            "serverSide" : true,
            "ajax" : {
                url:"{{ url('sample-get-data') }}",
                type:"POST",
                "data": {
                    _token: "{{csrf_token()}}"
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "gender",},
                { 
                    "data": "checkmark", 
                    "render": simple_checkbox,
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
                    "targets": [4],
                    "createdCell": function (td, cellData, rowData, row, col) {
                        $(td).attr('id', 'checkmark')
                        $(td).addClass('column_name')
                        
                    }
                }, 
                {
                    "targets": [1],
                    "createdCell": function (td, cellData, rowData, row, col) {
                        $(td).attr('contenteditable', 'true')
                    }
                }
            ]
    });


    $(document).on('blur', '.column_name', function(){
        var column_name = $(this).attr("id");
        var column_value = $(this).find('input')[0].checked === true?'Yes':'No';
        var titles = $( myTable.column( myTable.cell( this ).index().column ).header() ).html();
        var id = $(this).closest('tr').find("td:first").html(); 
        // console.log(column_name);

        // tabledit.update

        if(column_value != '')
        {
            $.ajax({
                url:"{{ route('tabledit.update') }}",
                method:"POST",
                data:{column_name:column_name, column_value:column_value, id:id, _token:token},
                success:function(data)
                {
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: id + ' changed!',
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
