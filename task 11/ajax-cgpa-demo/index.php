<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; // default empty for XAMPP
$dbname = "sample";

// Establish connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    exit("❌ Could not connect to the database: " . mysqli_connect_error());
}

// Check if 'q' parameter is set
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $cgpa = $_GET['q'];

    echo "Received CGPA: " . htmlspecialchars($cgpa) . "<br>";

    // Prepare query to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM student WHERE cgpa = ?");
    $stmt->bind_param("s", $cgpa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo "<table>
                <tr>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Rollno</th>
                  <th>CGPA</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['rollno']}</td>
                    <td>{$row['cgpa']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found for CGPA: " . htmlspecialchars($cgpa);
    }

    $stmt->close();
} else {
    echo "⚠ Please provide a valid CGPA.";
}

mysqli_close($con);
?>
