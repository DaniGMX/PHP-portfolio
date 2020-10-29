<!DOCTYPE html>

<?php

require '..\..\utils\utils.php';
require '..\..\utils\classes\html.php';

// HTML headings
HTML::title("Dynamic websites exercises", ['style' => "font-family:verdana"]);

// page Heading
HTML::append(HTML::makeElement('h1', [], ["Dynamic Websites Exercises!"]));

// exercise 1
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 1"]),
        HTML::makeElement('h3', [], ["What is a front-end developer? And a back-end developer? And full-stack developer?"]),
        HTML::makeElement('p', [], ["A front-end developer is one who develops user-level software, the one the users gets to interact with. On the other hand, a back-end developer is the one who gets to develop every operation the user doesn&#39;t get to see, as retrieving data from the database, loading images or sending messages in a chat."])
    ])
);
HTML::separate();

// exercise 2
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 2"]),
        HTML::makeElement('h3', [], ["What basic components (at the minimum) are needed to turn a static web page into a fully dynamic web page?"]),
        HTML::makeElement('p', [], ["User interaction and personalized content for each user."])
    ])
);
HTML::separate();

// exercise 3
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 3"]),
        HTML::makeElement('h3', [], ["What does HTML stand for? What is its role in dynamic webpages?"]),
        HTML::makeElement('p', [], ["It stands for HyperText Markup Language, and it defines the basic design of a web page. Even if the data changes, it need some structure to be held, so here is where HTML comes to place."])
    ])
);
HTML::separate();

// exercise 4
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 4"]),
        HTML::makeElement('h3', [], [" Why does the name MySQL contain the letters SQL? "]),
        HTML::makeElement('p', [], ["Because MySQL is based on SQL database language."])
    ])
);
HTML::separate();

// exercise 5
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 5"]),
        HTML::makeElement('h3', [], ["PHP and JavaScript are both programming languages that generate dynamic results for web pages. What is their main difference, and why would you need to use both of them?"]),
        HTML::makeElement('p', [], ["PHP is a server-side oriented scripting  language while JS is a client-side oriented scripting language."])
    ])
);
HTML::separate();

// exercise 6
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 6"]),
        HTML::makeElement('h3', [], ["What does CSS stand for? What is its role in dynamic web pages?"]),
        HTML::makeElement('p', [], ["It stands for Cascade Style Sheets and it defines the presentation and aesthetic design of each HTML element."])
    ])
);
HTML::separate();

// exercise 7
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 7"]),
        HTML::makeElement('h3', [], ["List three major new elements introduced in HTML5."]),
        HTML::makeElement('p', [], ['< article > , < progress > , < mark >'])
    ])
);
HTML::separate();

// exercise 8
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 8"]),
        HTML::makeElement('h3', [], ["What is a DNS? How does it work?"]),
        HTML::makeElement('p', [], ["It acts like a translator between intelligible machine binary names to enroute them to the correspondent receiver."])
    ])
);
HTML::separate();

// exercise 9
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 9"]),
        HTML::makeElement('h3', [], ["Can you create a “sequence diagram” (like the ones from slides 8 and 10) showing the flow of the AJAX example (in slide 24-26)."]),
        HTML::makeElement('p', [], ["Image not found lol"])
    ])
);
HTML::separate();

// exercise 10
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 10"]),
        HTML::makeElement('h3', [], ["What is the difference between a WAMP, a MAMP, and a LAMP?"]),
        HTML::makeElement('p', [], ["All the application servers: WAMP, LAMP, MAMP and XAMPP is a complete package containing PHP, MySql and Apache Server."])
    ])
);
HTML::separate();

// exercise 11
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 11"]),
        HTML::makeElement('h3', [], ["What does XAMPP stands for?"]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 12
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 12"]),
        HTML::makeElement('h3', [], ["What is the Root Folder in Apache Web Server?"]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 13
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 13"]),
        HTML::makeElement('h3', [], ["What are the main differences between the production and the development environment? Do I need both?"]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 14
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 14"]),
        HTML::makeElement('h3', [], ["What do the IP address 127.0.0.1 and the URL http://localhost have in common?"]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 15
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 15"]),
        HTML::makeElement('h3', [], ["If I store a folder called 123 inside my Root folder and a file inside that folder called 456.png how can I browse that file from my browser?"]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 16
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 16"]),
        HTML::makeElement('h3', [], ["What is the purpose of an FTP program?"]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 17
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 17"]),
        HTML::makeElement('h3', [], ["Name the main disadvantage of working on a local web server? And working on a remote web server."]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// exercise 
HTML::append(
    HTML::makeElement('div', [], [
        HTML::makeElement('h2', [], ["Exercise 18"]),
        HTML::makeElement('h3', [], ["Pick an FTP client (Filezilla is my suggestion), install it and configure it so you can access your production server."]),
        HTML::makeElement('p', [], [""])
    ])
);
HTML::separate();

// page ending
HTML::ending();

?>