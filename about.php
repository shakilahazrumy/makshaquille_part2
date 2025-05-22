<?php
// Example dynamic data
$groupMembers = [
    'Mak' => ['id' => '105920860', 'interests' => 'Gaming, Programming, Music', 'age' => 21, 'hometown' => 'Melbourne'],
    'Pal patel' => ['id' => '105923966', 'interests' => 'Reading, Sports, Travel', 'age' => 22, 'hometown' => 'Sydney'],
    'Denura' => ['id' => '105562893', 'interests' => 'Programming, Travel, Gaming', 'age' => 20, 'hometown' => 'Victoria'],
    'Shakila Hazrumy' => ['id' => '104100247', 'interests' => 'Design, Photography', 'age' => 21, 'hometown' => 'Melbourne'],
];

// Example group information
$classTime = "Monday 10:30 - 12:30 PM";
$tutor = "John Doe";
?>

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>About Us - Mak Shaquille</title>  
    <link rel="stylesheet" href="styles/styles.css">  
</head>  
<body>  
    <header>  
        <h1>Mak Shaquille</h1>  
        <h2>Class Time: <?php echo $classTime; ?></h2>  
    </header>  

    <main>  
        <section>  
            <h3>Group Information</h3>  
            <ul>  
                <li>Class Time:   
                    <ul>  
                        <li><?php echo $classTime; ?></li>  
                    </ul>  
                </li>  
                <li>Student IDs:  
                    <ul>  
                        <?php
                        foreach ($groupMembers as $name => $info) {
                            echo "<li>{$name}: {$info['id']}</li>";
                        }
                        ?>
                    </ul>  
                </li>  
            </ul>  
        </section>  

        <section>  
            <h3>Tutor</h3>  
            <p>Tutor: <?php echo $tutor; ?></p>  
        </section>  

        <section>  
            <h3>Members Contributions</h3>  
            <dl>  
                <dt>Mak (Software developer)</dt>  
                <dd>Created the job application form.</dd>  
                <dt>Pal patel (Product Owner)</dt>  
                <dd>Created job descriptions.</dd>  
                <dt>Denura (Software developer)</dt>  
                <dd>Developed the About page and job application form</dd>
                <dt>Shakila Hazrumy (Scrum Master)</dt>  
                <dd>Developed the Home page and CSS styles.</dd>  
            </dl>  
        </section>  

        <section>  
            <h3>Group Photo</h3>  
            <figure>  
                <img src="c:\Users\denur\Desktop\Web. Tec\Assigment 01 about page\Screenshot 2025-04-14 001224.png" alt="Group Photo" width="300" height="200">  
                <figcaption>Our Team</figcaption>  
            </figure>  
        </section>  

        <!-- Members' Interests Table -->  
        <section>  
            <h3>Members' Interests</h3>  
            <table>  
                <tr>  
                    <th>Name</th>  
                    <th>Interests</th>  
                </tr>    
                <?php
                foreach ($groupMembers as $name => $info) {
                    echo "<tr><td>{$name}</td><td>{$info['interests']}</td></tr>";
                }
                ?>
            </table>  
        </section>

        <section>  
            <h3>Group Profile</h3>  
            <p>We are a diverse team of individuals with a passion for web development. Our common goal is to create an engaging project using modern web technologies.</p>  
        </section>  

        <section>  
            <h3>Demographic Information</h3>  
            <ul>  
                <?php
                foreach ($groupMembers as $name => $info) {
                    echo "<li>{$name}: {$info['age']}, from {$info['hometown']}, studying Computer Science</li>";
                }
                ?>
            </ul>  
        </section>  

        <section>  
            <h3>Hometown Descriptions</h3>  
            <p>Mak: Melbourne is known for its vibrant arts scene and coffee culture.</p>  
            <p>Pal patel: Sydney boasts iconic landmarks like the Sydney Opera House and beautiful beaches.</p>  
            <p>Denura: Victoria is recognized for its stunning landscapes, vineyards, and cultural festivals.</p>
            <p>Shakila Hazrumy: Melbourne is known for its vibrant arts scene and coffee culture.</p>  
        </section>  

        <section>  
            <h3>Favorite Books, Music, and Films</h3>  
            <ul>  
                <li>Mak: Favorite Book - "1984", Music - Rock, Film - "Inception"</li>  
                <li>Pal patel: Favorite Book - "The Great Gatsby", Music - Jazz, Film - "The Shawshank Redemption"</li>  
                <li>Denura: Favorite Book - "To Kill a Mockingbird", Music - Pop, Film - "The Matrix"</li>
                <li>Shakila Hazrumy: Favorite Book - "1984", Music - Rock, Film - "Inception"</li>   
            </ul>  
        </section>    
    </main>  

    <footer>  
        <p>&copy; 2025 Your Group Name | <a href="http://jira.yourprojectlink.com">Project Management</a></p>  
    </footer>  

</body>
</html>
