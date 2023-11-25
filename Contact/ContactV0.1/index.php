<html>
<head>
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php

    function feedback($email, $name, $subject, $comment)
    {
        if (check($email) && check($name) && check($subject) && check($comment))
            insert($email, $name, $subject, $comment);
        else
            echo "<script type=\"text/javascript\">alert(\"Option cannot be blank\");</script>";
    }

    function check($var)
    {
        $len = strlen($var);
        if ($len > 0)
            return true;
        else
            return false;
    }

    function insert($dbemail, $dbname, $dbsubject, $dbcomment)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "web_tech";
        $tablename = "feedback_data";
        $field1 = "email";
        $field2 = "name";
        $field3 = "subject";
        $field4 = "comment";

        $insert = "insert into $tablename ($field1, $field2, $field3, $field4) values ('$dbemail', '$dbname', '$dbsubject', '$dbcomment')";

        $database = new mysqli($servername, $username, $password, $databasename);

        if ($database->connect_error)    
            die("<script type=\"text/javascript\">alert(\"Could not connect to database\");</script>" . $database->conncet_error);

        if($database->query($insert) === true)
            echo ("<script type=\"text/javascript\">alert(\"Your problem has be sent! We will contact you within 3 working days\");</script>");
        else
            die("<script type=\"text/javascript\">alert(\"Could not execute insertion!\");</script>" . mysqli_error($database));

        $database->close();
    }

    ?>
</head>
<body>

<section id="contact">
    <form action="index.php" method="post">
        <div class="container-lg">
            <div class="text-center">
                <h2>Contact Us</h2>
                <p class="lead">Questions to ask? Fill out the form to contact us directly</p>
            </div>

            <div class="row justify-content-center my-5">
                <div class="col-lg-6">
                    <label for="email" class="form-label">Email address:</label>
                    <div class="mb-4 input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                             </svg>
                        </span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="cyberverse@example.com">
                    </div>                       

                    <label for="name" class="form-label">Name:</label>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="cyberverse">
                    </div>
                        
                    <label for="subject" class="form-label">Related question</label>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94"/>
                            </svg>
                        </span>
                        <select class="form-select" name="subject" id="subject">
                            <option value="pricing" selected>Pricing</option>
                            <option value="technical">Technical Support</option>
                            <option value="other">Other...</option>
                        </select>
                    </div>

                    <div class="form-floating mb-4 mt-5">
                        <textarea class="form-control" name="comment" id="comment" style="height:140px" placeholder="Please describe your problem..."></textarea>
                        <label for="comment" class="form-label">Please describe your problem...</label>                            
                    </div>

                    <div class="mb-4 text-center">                   
                        <input type="submit" name="submit" value="Submit"> 
                    </div>
                </div>
            </div>           
        </div>
    </form>
    <?php

    if(isset($_POST["submit"]))           
        feedback($_POST["email"], $_POST["name"], $_POST["subject"], $_POST["comment"], $_POST["submit"]);

    ?>   
</body>
</html>
