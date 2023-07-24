<?php
// Include the database config file 
include_once 'config.php';

if (!empty($_POST["uniID"])) {
    
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM colleges WHERE university_id = " . $_POST['uniID'] . "  ";
    $result = $conn->query($query);

    // Generate HTML of state options list 
    if ($result->num_rows > 0) {
        echo '<option value=""> أختر من فضلك</option>'; 
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['college_name'] . '</option>';         
            
        }
       
    } else {
        echo '<option value="">لا توجد اقسام </option>';
    }
 
}

 elseif (!empty($_POST["colId"])) {
    $query = "SELECT * FROM departments WHERE collage_id  = " . $_POST['colId'] . "  ";
    $result = $conn->query($query);

    // Generate HTML of state options list 
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['department_name'] . '</option>';
        }
    } else {
        echo '<option value="">لا توجد اقسام </option>';
    }
}
if (!empty($_POST["govid"])) {
    
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM qathaa WHERE govid = " . $_POST['govid'] . "  ";
    $result = $conn->query($query);

    // Generate HTML of state options list 
    if ($result->num_rows > 0) {
        echo '<option value=""> أختر من فضلك</option>'; 
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['qathaid'] . '">' . $row['qathaname'] . '</option>';         
            
        }
       
    } else {
        echo '<option value="">لا توجد اقضية  </option>';
    }
 
}

 elseif (!empty($_POST["qid"])) {
    $query = "SELECT * FROM neighbourhood WHERE qathaid  = " . $_POST['qid'] . "  ";
    $result = $conn->query($query);

    // Generate HTML of state options list 
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['naighbourid'] . '">' . $row['naighbouname'] . '</option>';
        }
    } else {
        echo '<option value="">لا توجد نواحي </option>';
    }
}

?>