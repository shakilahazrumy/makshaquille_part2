<!DOCTYPE html>  
<html lang="en">  
<?php
    include 'header.inc';
?>  
<body class="page-general enhancement">
    
 <header>   
        <header>
        <p>We would like to acknowledge that the logo used  in this page 
        was created by ChatGPT</p>
            <?php
                include 'nav.inc';
             ?>   
    </header>  

<?php
// Define each enhancement as an array for clarity and potential reuse
$enhancements = [
    [
        "title" => "1. Create manager registration page",
        "description" => "This section removes default spacing in browsers and applies a consistent serif font to all text elements.",
        "code" => " space for code"
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

</body>
</html>

<?php include('footer.inc'); ?>
