<?php
// Your PHP code in "update_table.php"

// Check if the Ajax POST request contains the necessary data
if (isset($_POST['certif']) && isset($_POST['spech']) && isset($_POST['channel']) && isset($_POST['gov'])) {
    // Get the selected dropdown values from the Ajax request
    $certif = $_POST['certif'];
    $spech = $_POST['spech'];
    $channel = $_POST['channel'];
    $gov = $_POST['gov'];

    include ('config.php');

    // Build the SQL query based on the selected dropdown values
    $sql = "SELECT * FROM befor_tadqeq WHERE ";

    $conditions = array();
    if (!empty($certif)) {
        $conditions[] = "certif = '$certif'";
    }
    if (!empty($spech)) {
        $conditions[] = "spech = '$spech'";
    }
    if (!empty($channel)) {
        $conditions[] = "channel = '$channel'";
    }
    if (!empty($gov)) {
        $conditions[] = "gov = '$gov'";
    }
    $conditions[] = "au_flag = '0'";

    $sql .= implode(" AND ", $conditions );

    // Execute the query and fetch the data
    $result = mysqli_query($conn, $sql);
   //echo $sql;
    // Check if the query was successful
    if ($result) {

        // Check if any data is returned
        if (mysqli_num_rows($result) > 0) {
            // Prepare the table rows to be returned
            $tableContent = array();
            while ($row = $result->fetch_assoc()) {
                $rowData = array(
                    "ginid" => $row['ginid'],
                    "tadqeq_id" => $row['tadqeq_id'],
                    "degree_befor" => $row['degree_befor'],
                    "certif" => $row['certif'],
                    "spech" => $row['spech'],
                    "channel" => $row['channel'],
                    "gov" => $row['gov']
                    // Add more columns as needed
                );
                // Add each row data to the table content array
                $tableContent[] = $rowData;
            }
        
            // Convert the table content array to JSON format
            $jsonTableContent = json_encode($tableContent);
        
            // Return the JSON data as the response
            echo $jsonTableContent;
        } else {
            // Return a message if no data is found
            echo json_encode(array("error" => "لا توجد بيانات "));
        }
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    $conn->close();
} else {
    // Return an error message if the necessary data is not received
    echo "Error: Missing required data.";
}
?>
