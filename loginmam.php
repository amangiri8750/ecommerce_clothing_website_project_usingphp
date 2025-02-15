<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>


</head>
<body>
    <input type="text" id="search">
    <div class="div"></div>
    <div id="formdiv">

    <script>

         $(document).ready(function(e){
        
            $.ajax({
                url: "all_loginmem.php",
                type: "POST",
                success :function(data){
                    $('.div').html(data);

                }

            })
    });

 

    $(document).on("click",".delete",function () {

var wer = $(this).data("emak");
var ele =this;

$.ajax({
    url: "loginmamdel.php",
    type: "POST",
    data: {em : wer},
    success:function(dat){
        if(dat == 1){
            if(confirm("kar du delete")){
         $(ele).closest("tr").fadeOut();
            }else{

            }
        }else{
          "server not found";
        }

    }
})
})





$("#search").on("keyup",function(){
                var search = $(this).val();
                $.ajax({
                    url: "search.php",
                    type: "POST",
                    data: {ser:search},
                    success:function(td){
                    $('.div').html(td);
                        
                    }
                })



            })






            $(document).on('click','.edit',function(){
            $("#formdiv").show()
           
            var we = $(this).data("adit");
            // var el =this;
            // alert(we);
            $.ajax({
                url: "ajaxupdateform.php",
                type: "POST",
                data: {elu:we},
                success:function(dta){
                   $("#formdiv").html(dta)
                }
            })
        })

        
        $(document).on('click', '.upsumit', function() {
    var upem = $('#upe').val();
    var upp = $('#upp').val();
    var upa = $('#upa').val();
    var upn = $('#upn').val();
    var upg = $('#upg').val();
    $.ajax({
        url: "ajaxfinalupdate.php",
        type: "POST",
        data: {
            upm: upem,
            uppp: upp,
            upa: upa,  // Changed from 'upap' to 'upa'
            upn: upn,  // Changed from 'upnp' to 'upn'
            upg: upg   // Changed from 'upgp' to 'upg'
        },
        success: function(dd) {
            if (dd == 1) {
                $("#formdiv").hide();
            } else {
                document.write("Query wrong");
            }
        }
    });
});






    </script>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #search {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            margin: 0 auto 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .div {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        #formdiv {
            display: none;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #218838;
        }

        .delete {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete:hover {
            background-color: #c82333;
        }

        .edit {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>User Management</h1>
    <input type="text" id="search" placeholder="Search...">
    <div class="div"></div>
    <div id="formdiv"></div>

    <script>
        $(document).ready(function(e){
            $.ajax({
                url: "all_loginmem.php",
                type: "POST",
                success :function(data){
                    $('.div').html(data);
                }
            });
        });

        $(document).on("click",".delete",function () {
            var wer = $(this).data("emak");
            var ele = this;

            $.ajax({
                url: "loginmamdel.php",
                type: "POST",
                data: {em : wer},
                success:function(dat){
                    if(dat == 1){
                        if(confirm("Are you sure you want to delete?")){
                            $(ele).closest("tr").fadeOut();
                        }
                    } else {
                        alert("Server not found");
                    }
                }
            });
        });

        $("#search").on("keyup",function(){
            var search = $(this).val();
            $.ajax({
                url: "search.php",
                type: "POST",
                data: {ser:search},
                success:function(td){
                    $('.div').html(td);
                }
            });
        });

        $(document).on('click','.edit',function(){
            $("#formdiv").show();
            var we = $(this).data("adit");

            $.ajax({
                url: "ajaxupdateform.php",
                type: "POST",
                data: {elu:we},
                success:function(dta){
                    $("#formdiv").html(dta);
                }
            });
        });

        $(document).on('click', '.upsumit', function() {
            var upem = $('#upe').val();
            var upp = $('#upp').val();
            var upa = $('#upa').val();
            var upn = $('#upn').val();
            var upg = $('#upg').val();
            $.ajax({
                url: "ajaxfinalupdate.php",
                type: "POST",
                data: {
                    upm: upem,
                    uppp: upp,
                    upa: upa,
                    upn: upn,
                    upg: upg
                },
                success: function(dd) {
                    if (dd == 1) {
                        $("#formdiv").hide();
                    } else {
                        document.write("Query wrong");
                    }
                }
            });
        });
    </script>
</body>
</html>
