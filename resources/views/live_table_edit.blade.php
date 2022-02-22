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

    $('#sample_data').DataTable({
            "order": [
                    [1, "desc"]
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
                { "data": "gender" },
                { "data": "checkmark" },
                { 
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ]
    }); 



    $('#sample_data').on('draw.dt', function(){
        $('#sample_data').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType:'json',
            columns:{
                identifier : [0, 'id'],
                editable:
                [
                    [1, 'first_name'], 
                    [2, 'last_name'], 
                    [3, 'gender', '{"1":"Male","2":"Female"}'],
                    [4, 'checkmark', '{"1":"true","2":"false"}']
                ]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                $('#' + data.id).remove();
                $('#sample_data').DataTable().ajax.reload();
                }
            }
        });
    });
  
}); 
</script>
