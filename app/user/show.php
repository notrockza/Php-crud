<h5>มหาวิทยาลัย</h5><br>


<form class="form-inline w-100">
    <button type="button" class="btn btn-success" onclick="showAdd()">
        เพิ่ม
    </button>
    <div class="form-group mb-2">
        <input id="searchs"  class="form-control" type="text" onkeyup="showlist();" placeholder="ค้นหา">
    </div>
</form>

<div class="row" id="show">

</div>

<script>
  
    const showlist = () => {
        $.post("app/user/pro.php",{ 
            status : 'r' ,
            searchs : $("#searchs").val()
        },(data) => {
            $("#show").html(data);
            //alert("5555")
        });
    };
    showlist();

    const del = (id) => {
        if(confirm("คุณต้องการลบหรือไม่ !"))
            {
                $.post("app/user/pro.php",{ 
                status : 'd' ,
                id : id
            },data => {
                if(data == "ok"){
                    alert("ลบข้อมูลสำเร็จ");
                }
                showlist();
            });
        };
    };

    const showAdd = () => {
        $("#show").load("app/user/add.php");
    };

    const add = () => {
        if($("#use_name").val() != ""){
            $.post("app/user/pro.php",{ 
                    status : 'c' ,
                    use_name : $("#use_name").val()
                },data => {
                    alert("เพิ่มข้อมูลสำเร็จ");
                    showlist();
                });
        }else{
            alert("กรุณากรอกชื่อ !");
        }
    };

    const showEdit = (id) => {
        $("#show").load("app/user/edit.php" , {id});
    };

    const edit = (id) => {
        $.post("app/user/pro.php",{ 
            status : 'u' ,
            use_name : $("#use_name").val(),
            id : id
        },data => {
            showlist();
            alert(data);
        });
    };

    
</script>