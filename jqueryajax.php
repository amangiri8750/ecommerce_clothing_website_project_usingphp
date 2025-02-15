<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="jquery.js"> -->
     <script src="jquery.js"></script>
     <style>
        #formdiv{
            height: 40vh;

            /* position: relative; */
            background-color: rgba(0, 0, 0, .3);
            top: 10px;
            display: none;
        }
       
        .close{
            position: absolute;
            left: 99%;
        }
        input{
            width: 100px;
        }
     </style>
</head>
<body>
    <input type="text" id="search">
    
<table id='formdiv' width="100%" cellspacing="10px">
    
    </table>
    <div class="close">X</div>

<form action="" id="from">
<input type="text" id="emal">
<input type="text" id="pas"></form>
<button id="enter">enter</button>



    <button type="button" id="load">load data</button>
    <div class="div"></div>
    <div class="div1"></div>
     <script>
        $(document).ready(function(){
        $('#load').click(function (e) {
            $.ajax({
                url: "login.php",
                type: "POST",
                success :function(data){
                    $('.div').html(data);

                }

            })
            
        });



        function loaddata() {
            $.ajax({
                url: "login.php",
                type: "POST",
                success :function(data){
                    $('.div').html(data);

                }

            })
        }
            

        
        $("#enter").click(function (d) {
         var emal = $("#emal").val();
         var pas = $("#pas").val();
         $.ajax({
            url: "ajaxinsert.php",
            type: "POST",
            data: {emaal:emal,pasu:pas},
            success:function(daat){
                if(daat == 1){
              lodtable  ();
              $("#from").trigger();
                }else{
                    alert("not record");
                }
            }
         })
            
        })




        $(document).on("click",".delete",function () {

            var wer = $(this).data("emak");
            var ele =this;
        
            $.ajax({
                url: "ajaxdelete.php",
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
         
        $(".close").click(function(){
            $("#formdiv").hide();


          


        })
        $(document).on('click','.upsumit',function(){
                var upem = $('#upe').val();
                var upp = $('#upp').val();
                $.ajax({
                    url: "ajaxfinalupdate.php",
                    type: "POST",
                    data: {upm:upem,uppp:upp},
                    success:function(dd){
                          if(dd == 1){
                            $("#formdiv").hide();
                            loaddata();
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



            // function lodtable(page){
            //    $.ajax({
            //     url : "ajaxpagination.php",
            //     type: "POST",
            //     data: {page_id:page},
            //     success:function(daat){
            //         $(".div").html(daat)
            //     }
            //    })
            // }
            // lodtable();

            // $(document).on("click","a",function(e){
            //    e.preventDefault();
            //    var page_id = $(this).attr("id");
            //    lodtable(page_id)
            // })

            function lodtable(page){
                $.ajax({
                    url: "loadmore.php",
                    type: "POST",
                    data: {page_id: page},
                    success :function(data){
                        if(data){
                        $(".div").empty();
                $(".div").append(data)
                        }else{
                            $(".load").html("finish");
                            $(".load").prop("disabled",true);
                        }      
                    }
                })
            }
            lodtable();

            $(document).on("click",".load",function(){
                var pid = $(this).data("id");
            lodtable(pid);

            })

           
    })
        

        ;
       
     </script>



</body>
</html>