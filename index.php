<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Alex</title>
    <?php include 'imports.php' ?>
    <!-- JS -->
    <script src="scripts.js"></script>
</head>

<body>
<?php include "nav.php" ?>
<!-- <?php include "sideNav.php" ?> -->
<div id="hero" class="selection">
    <p class="title">Alex</p>
    <p>Welcome to my portfolio website.</p>
</div>
<div id="about" class="selection">
    <p class="header">About</p>
    <p>I am Alex, a computer science student aspiring to learn and get comfortable with designing and developing
        modern web apps and games.</p>
</div>
<div id="projects" class="invSelection">
    <p class="header">Projects</p>
    <div class="pGrid">
        <img src="image1.jpg" class="projectOddImg" alt="project image">
        <div class="project projectOdd">
            <p class="subheader">Project 1</p>
            <p>This project was very important to me due to Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Sint tempora eum dolores unde aliquam nemo! Facere consectetur suscipit quos, facilis quis ullam
                aperiam
                maiores culpa accusantium, minus voluptatibus voluptas blanditiis?</p>
        </div>
        <img src="image1.jpg" class="projectEvenImg" alt="project image">
        <div class="project projectEven">
            <p class="subheader">Project 2</p>
            <p>This project was very important to me due to Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Sint tempora eum dolores unde aliquam nemo! Facere consectetur suscipit quos, facilis quis ullam
                aperiam
                maiores culpa accusantium, minus voluptatibus voluptas blanditiis?</p>
        </div>
    </div>
</div>
<div id="contact" class="selection">
    <div id="contactCard">
        <p class="header">Contact</p>
        <form action="contact.php" method="post">
            <label for="mail">Mail</label>
            <input type="text" name="mail" id="mail" placeholder="jane.dingus@mail.com" required>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Jane Dingus" required>
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10"
                      placeholder="Hello, I'd like to inform you about your car's extended warranty."
                      required></textarea>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<?php include "footer.php" ?>
</body>

</html>