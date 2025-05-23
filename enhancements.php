<?php include('header.inc'); 

// enhancements.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSS Enhancements Showcase</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #46767E;
            color: #EBC4BB;
            text-align: center;
            padding: 30px 0;
        }
        section {
            background-color: #ffffff;
            margin: 30px auto;
            padding: 20px 30px;
            max-width: 800px;
            border-left: 5px solid #46767E;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #46767E;
        }
        h2 {
            margin-top: 0;
        }
        code {
            display: block;
            background: #f0f0f0;
            border-left: 4px solid #EBC4BB;
            padding: 10px;
            margin: 10px 0;
            white-space: pre-wrap;
            font-family: Consolas, monospace;
        }
        footer {
            text-align: center;
            background-color: #46767E;
            color: #EBC4BB;
            padding: 10px;
        }
    </style>
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
