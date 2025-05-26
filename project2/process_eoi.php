<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "Job_Application";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Collect and clean inputs
$jobReferenceNumber = isset($_POST['jobRef']) ? clean_input($_POST['jobRef']) : '';

// First name: max 20 alpha chars
$firstName = isset($_POST['firstName']) ? clean_input($_POST['firstName']) : '';
if (!preg_match('/^[a-zA-Z]{1,20}$/', $firstName)) {
    die("First name must be 1-20 alphabetic characters only.");
}

// Last name: max 20 alpha chars
$lastName = isset($_POST['lastName']) ? clean_input($_POST['lastName']) : '';
if (!preg_match('/^[a-zA-Z]{1,20}$/', $lastName)) {
    die("Last name must be 1-20 alphabetic characters only.");
}

// Street address max 40 chars
$streetAddress = isset($_POST['street']) ? clean_input($_POST['street']) : '';
if (strlen($streetAddress) > 40) {
    die("Street address must be 40 characters or fewer.");
}

// Suburb/town max 40 chars
$suburbTown = isset($_POST['suburb']) ? clean_input($_POST['suburb']) : '';
if (strlen($suburbTown) > 40) {
    die("Suburb/town must be 40 characters or fewer.");
}

// State VIC,NSW,QLD,NT,WA,SA,TAS,ACT validation
$state = isset($_POST['state']) ? strtoupper(clean_input($_POST['state'])) : '';
$validStates = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
if (!in_array($state, $validStates)) {
    die("Invalid state selected.");
}

// Postcode exactly 4 digits and matches state
$postcode = isset($_POST['postcode']) ? clean_input($_POST['postcode']) : '';
if (!preg_match('/^\d{4}$/', $postcode)) {
    die("Postcode must be exactly 4 digits.");
}
$statePostcodeStart = [
    "VIC" => ["3"],
    "NSW" => ["1", "2"],
    "QLD" => ["4"],
    "NT"  => ["0"],
    "WA"  => ["6"],
    "SA"  => ["5"],
    "TAS" => ["7"],
    "ACT" => ["0"]
];
$postcodeStart = substr($postcode, 0, 1);
if (!in_array($postcodeStart, $statePostcodeStart[$state])) {
    die("Postcode does not match the selected state.");
}

// Email address validate format
$emailAddress = isset($_POST['email']) ? clean_input($_POST['email']) : '';
if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address format.");
}

// Phone number 8 to 12 digits or spaces
$phoneNumber = isset($_POST['phone']) ? clean_input($_POST['phone']) : '';
if (!preg_match('/^[0-9 ]{8,12}$/', $phoneNumber)) {
    die("Phone number must be 8 to 12 digits or spaces only.");
}

// Skills - checkbox inputs
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
$html = in_array('HTML', $skills) ? "Yes" : NULL;
$css = in_array('CSS', $skills) ? "Yes" : NULL;
$javaScript = in_array('JavaScript', $skills) ? "Yes" : NULL;
$python = in_array('Python', $skills) ? "Yes" : NULL;

// Other skills - if checkbox selected (assume checkbox named 'otherSkillsCheckbox'), text must not be empty
$otherSkillsCheckbox = isset($_POST['otherSkillsCheckbox']) ? true : false;
$otherSkills = (isset($_POST['otherSkills']) && !empty(trim($_POST['otherSkills']))) ? clean_input($_POST['otherSkills']) : NULL;
if ($otherSkillsCheckbox && empty($otherSkills)) {
    die("Please specify your other skills if the 'Other skills' checkbox is selected.");
}

$sql = "INSERT INTO eoi 
    (JobReferenceNumber, FirstName, LastName, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, HTML, CSS, JavaScript, Python, OtherSkills)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param(
    "ssssssssssssss",
    $jobReferenceNumber,
    $firstName,
    $lastName,
    $streetAddress,
    $suburbTown,
    $state,
    $postcode,
    $emailAddress,
    $phoneNumber,
    $html,
    $css,
    $javaScript,
    $python,
    $otherSkills
);

if ($stmt->execute()) {
    echo "<h2>Application submitted successfully!</h2>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// i would like to Acknowledge the use of ChatGPT assistance
echo "<p><em>Code assisted by ChatGPT.</em></p>";
?>

