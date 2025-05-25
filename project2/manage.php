<?php
require_once("settings.php");

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Helper function to show results
function showResults($results) {
    if ($results->num_rows > 0) {
        echo "<table class='table table-striped table-bordered mt-3'><thead><tr>
            <th>EOI Number</th><th>Job Reference</th><th>First Name</th><th>Last Name</th>
            <th>Status</th></tr></thead><tbody>";
        while ($row = $results->fetch_assoc()) {
            echo "<tr>
                <td>{$row['EOInumber']}</td>
                <td>{$row['JobReferenceNumber']}</td>
                <td>{$row['FirstName']}</td>
                <td>{$row['LastName']}</td>
                <td>{$row['Status']}</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='text-danger mt-3'>No EOIs found.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2 class="mb-4">EOI Manager</h2>

    <!-- List by Job Reference Form -->
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="jobRef" class="form-control" placeholder="Job Reference">
        </div>
        <div class="col-md-3">
            <select name="sortField" class="form-select">
                <option value="EOInumber">EOI Number</option>
                <option value="FirstName">First Name</option>
                <option value="LastName">Last Name</option>
                <option value="Status">Status</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="sortOrder" class="form-select">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" name="listByJob" class="btn btn-outline-primary w-100">List EOIs by Job Ref</button>
        </div>
    </form>

    <!-- List by Applicant Name Form -->
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="firstName" class="form-control" placeholder="First Name">
        </div>
        <div class="col-md-3">
            <input type="text" name="lastName" class="form-control" placeholder="Last Name">
        </div>
        <div class="col-md-2">
            <select name="sortField" class="form-select">
                <option value="EOInumber">EOI Number</option>
                <option value="FirstName">First Name</option>
                <option value="LastName">Last Name</option>
                <option value="Status">Status</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sortOrder" class="form-select">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" name="listByName" class="btn btn-outline-success w-100">List EOIs by Name</button>
        </div>
    </form>

<?php
// Handle List by Job Reference
if (isset($_POST['listByJob']) && !empty($_POST['jobRef'])) {
    $sortField = in_array($_POST['sortField'], ['EOInumber', 'FirstName', 'LastName', 'Status']) ? $_POST['sortField'] : 'EOInumber';
    $sortOrder = ($_POST['sortOrder'] === 'DESC') ? 'DESC' : 'ASC';

    $stmt = $conn->prepare("SELECT * FROM eoi WHERE JobReferenceNumber = ? ORDER BY $sortField $sortOrder");
    $stmt->bind_param("s", $_POST['jobRef']);
    $stmt->execute();
    $results = $stmt->get_result();

    echo "<h5>EOIs for Job Reference: " . htmlspecialchars($_POST['jobRef']) . " (Sorted by $sortField $sortOrder)</h5>";
    showResults($results);
    $stmt->close();
}

// Handle List by Name
if (isset($_POST['listByName'])) {
    $first = !empty($_POST['firstName']) ? "%" . $_POST['firstName'] . "%" : '%';
    $last = !empty($_POST['lastName']) ? "%" . $_POST['lastName'] . "%" : '%';

    $sortField = in_array($_POST['sortField'], ['EOInumber', 'FirstName', 'LastName', 'Status']) ? $_POST['sortField'] : 'EOInumber';
    $sortOrder = ($_POST['sortOrder'] === 'DESC') ? 'DESC' : 'ASC';

    $stmt = $conn->prepare("SELECT * FROM eoi WHERE FirstName LIKE ? OR LastName LIKE ? ORDER BY $sortField $sortOrder");
    $stmt->bind_param("ss", $first, $last);
    $stmt->execute();
    $results = $stmt->get_result();

    echo "<h5>EOIs for Applicant: " . htmlspecialchars($_POST['firstName']) . " " . htmlspecialchars($_POST['lastName']) . " (Sorted by $sortField $sortOrder)</h5>";
    showResults($results);
    $stmt->close();
}

$conn->close();
?>

</body>
</html>
