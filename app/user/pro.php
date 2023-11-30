<?php
    include "../../js/function_db.php";
    if($_POST['status'] == "r"){  
        $sql = "SELECT * FROM user WHERE use_id<>0";
        if($_POST['searchs'] != ""){
            $sql .= " AND use_name LIKE '%".$_POST['searchs']."%'";
        };
    $result= selectSql($sql);
?>

<div class="table-responsive-sm w-100">
    <table class="table table-striped border border-dark">
        <thead class="table table-dark">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
   
      <?php 
        foreach ($result as $row) { ?>
        <tr>
            <td><?php echo $row['use_id'] ?></td>
            <td><?php echo $row['use_name'] ?></td>
            <td>
                <button class="btn btn-warning" onclick="showEdit('<?php echo $row['use_id'] ?>')">
                    edit
                </button>
                <button class="btn btn-danger" onclick="del('<?php echo $row['use_id'] ?>')">
                    delete
                </button>
            </td>
        </tr>
        <?php  }?>
    
    </tbody>
    </table>
    
</div>

<?php 
    }elseif($_POST['status'] == "c"){
        $sql = "INSERT INTO user(use_name) VALUES ('".$_POST['use_name']."')";
        in_up_delSql($sql);
        echo "ok";
    }
    elseif($_POST['status'] == "u"){
         $sql = "UPDATE user SET use_name='".$_POST['use_name']."' WHERE use_id = '".$_POST['id']."'";
         in_up_delSql($sql);
         echo "ok";
    }
    elseif($_POST['status'] == "d"){
        $sql = "DELETE FROM user WHERE use_id = '".$_POST['id']."'";
        in_up_delSql($sql);
        echo "ok";
    }
 ?>