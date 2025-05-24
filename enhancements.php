<?php include('header.inc'); 

// enhancements.php
?>
<!DOCTYPE html>
<html lang="en">
     <?php
            include 'nav.inc';
        ?> 
<head>
    <meta charset="UTF-8">
    <title>CSS Enhancements Showcase</title>
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body>

<header>
    <h1>CSS Enhancements Showcase</h1>
    <p>A visual guide to styling techniques used in the Web Technology Project</p>
</header>

<?php
// Define each enhancement as an array for clarity and potential reuse
$enhancements = [
    [
        "title" => "1. Global Styling Enhancements",
        "description" => "This section removes default spacing in browsers and applies a consistent serif font to all text elements.",
        "code" => "body, html {\n    padding: 0;\n    margin: 0;\n}\n* {\n    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;\n}"
    ],
    [
        "title" => "2. Header and Navigation Styling",
        "description" => "Applies color schemes and alignment to the header and makes hyperlinks interactive with hover effects.",
        "code" => "#header {\n    text-align: right;\n    color: #EBC4BB;\n    background-color: #46767E;\n}\na:hover {\n    color: #46767E;\n    background-color: #EBC4BB;\n}"

    ],
    

    
];

// Output each enhancement as a section
foreach ($enhancements as $enhancement) {
    echo "<section>";
    echo "<h2>{$enhancement['title']}</h2>";
    echo "<p>{$enhancement['description']}</p>";
    echo "<code>{$enhancement['code']}</code>";
    echo "</section>";
}
?>

<footer>
    &copy; 2025 Web Technology Project | Group Mak_Shaquille
</footer>

</body>
</html>

<?php include('footer.inc'); ?>
