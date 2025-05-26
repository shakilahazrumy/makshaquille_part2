<?php
require_once("connect_jobsdb.php");

//Establish a connection to the database
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$dbconn) {
    echo "<p>Unable to connect to the database.</p>";
} else {
    $sql = "SELECT job_ref, title, salary_range, reports_to, description, key_responsibilities, education, experience FROM jobs_database";
    $result = mysqli_query($dbconn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ref = htmlspecialchars($row['job_ref']); 
            $title = htmlspecialchars($row['title']); 
            $salary = htmlspecialchars($row['salary_range']);
            $report = htmlspecialchars($row['reports_to']);
            $desc = htmlspecialchars($row['description']); 
            $resp = htmlspecialchars($row['key_responsibilities']); 
            $edu = htmlspecialchars($row['education']); 
            $exp = htmlspecialchars($row['experience']); 
        }
    } else {
        echo "<p>🚫 No jobs found in the database.</p>"; 
    }

    //Close the database connection
    mysqli_close($dbconn);
}
?> 
