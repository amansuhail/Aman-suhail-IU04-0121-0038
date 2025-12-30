<!DOCTYPE html>
<html>
<head>
    <title> CRUD with AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-3">Student Information</h3>

    <form id="studentForm" class="card p-4">
        <input type="hidden" id="id">

        <div class="mb-3 ">
            <label>Name</label>
            <input type="text" id="name" class="form-control">
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" id="email" class="form-control">
        </div>

        <div class="mb-2">
            <label>Course</label>
            <input type="text" id="course" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
    <table class="table table-bordered mt-4 bg-white">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="data"></tbody>
    </table>
</div>

<script>
$(document).ready(function(){

    loadData();

    
    function loadData(){
        $.ajax({
            url: "ajax.php",
            type: "GET",
            data: { action: "read" },
            success: function(response){
                $("#data").html(response);
            }
        });
    }

    
    $("#studentForm").submit(function(e){
        e.preventDefault();

        let id = $("#id").val();
        let action = id ? "update" : "create";

        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {
                action: action,
                id: id,
                name: $("#name").val(),
                email: $("#email").val(),
                course: $("#course").val()
            },
            success: function(){
                loadData();
                $("#studentForm")[0].reset();
                $("#id").val("");
            }
        });
    });

    
    $(document).on("click", ".edit", function(){
        let id = $(this).data("id");

        $.ajax({
            url: "ajax.php",
            type: "GET",
            data: { action: "get", id: id },
            success: function(response){
                let data = JSON.parse(response);

                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#course").val(data.course);
            }
        });
    });


    $(document).on("click", ".delete", function(){
        if(!confirm("Are you sure you want to Delete this record?")) return;

        let id = $(this).data("id");

        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: { action: "delete", id: id },
            success: function(){
                loadData();
            }
        });
    });

});
</script>

</body>
</html>
