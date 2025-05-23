<?php
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
    [
        "title" => "3. Flexbox for Centering",
        "description" => "Uses Flexbox to horizontally and vertically center items within a container.",
        "code" => ".display {\n    display: flex;\n    align-items: center;\n    justify-content: center;\n}"
    ],
    [
        "title" => "4. Grid Layout for Forms",
        "description" => "Uses CSS Grid to organize form elements into two equal columns with consistent spacing.",
        "code" => ".container {\n    display: grid;\n    grid-template-columns: repeat(2, 1fr);\n    gap: 1em;\n}\n.span-columns {\n    grid-column: span 2;\n}"
    ],
    [
        "title" => "5. Visual Hierarchy with Typography",
        "description" => "Color-codes headings and applies unique styling to the first line of certain text blocks for emphasis.",
        "code" => "h1, h2 {\n    color: #46767E;\n}\n.group-info::first-line {\n    background-color: #EBC4BB;\n    color: #46767E;\n}"
    ],
    [
        "title" => "6. Table Styling",
        "description" => "Improves readability of tables using borders, padding, and highlighted headers with strong contrast.",
        "code" => "table, th, td {\n    border: solid #234247;\n    padding: 2px;\n}\nth {\n    background-color: #EBC4BB;\n    color: #46767E;\n}"
    ],
    [
        "title" => "7. Buttons and Hover Effects",
        "description" => "Styles buttons with a consistent look and uses hover states to visually indicate interactivity.",
        "code" => ".action {\n    background-color: #EBC4BB;\n    color: #46767E;\n}\n.action:hover {\n    background-color: #46767E;\n    color: #EBC4BB;\n}"
    ],
    [
        "title" => "8. Content Block Styling",
        "description" => "Uses padding, borders, and background images to visually distinguish content sections.",
        "code" => ".our-history {\n    width: 45%;\n    float: left;\n    padding: 20px;\n    border: solid #46767E;\n    background-image: url(\"../styles/images/wallpaper.jpeg\");\n}"
    ]
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
