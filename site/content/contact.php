<div class="container">
    <?php
        $email_to = 'realperson@stuartadv.com';
        $subject = 'Stuart Adv Contact Us :: ';

        function isValidEmail($email){
            return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
        }

        function printError($error) {
            echo '<div class="alert alert-danger" style="padding:10px; margin: 10px; margin-bottom: 50px;">';
            echo $error;
            echo '</div>';
        }

        function printSuccess($success) {
            echo '<div class="alert alert-success" style="padding:10px; margin: 10px; margin-bottom: 50px;">';
            echo $success;
            echo '</div>';
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!isset($_POST['name']) ||
                !isset($_POST['email']) ||
                !isset($_POST['message']) ||
                !isset($_POST['spam_filter'])) {
                printError('<b class="error">All fields are required!</b>');
            }else {
                if($_POST['spam_filter'] != 4) {
                    printError('<b class="error">Invalid spam filter answer, are you a robot?!</b>');
                } else {
                    if(!isValidEmail($_POST['email'])) {
                        printError('<b class="error">Invalid email!</b>');
                    } else {
                        $headers = 'From: ' . $_POST['email'] . "\r\n" .
                            'Reply-To: ' . $_POST['email'] . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                        $message = $_POST['message'];

                        mail($email_to, $subject, $message, $headers);

                        printSuccess('Message sent successfully!');
                    }
                }
            }
        }
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <p>
                <b>Phone:</b> 509-448-5601<br>
                <b>Fax:</b> 509-448-5609<br>
                <b>Email:</b> realperson@stuartadv.com
            </p>

            <p>
                2601 West Gardner Ave.,<br>
                Spokane WA 99201
            </p>

            <iframe class="contact-us-map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=2601+west+gardner,+spokane,+wa+99201&amp;aq=&amp;sll=47.650995,-117.423835&amp;sspn=0.012344,0.033023&amp;ie=UTF8&amp;hq=&amp;hnear=2601+W+Gardner,+Spokane,+Washington+99201&amp;t=m&amp;z=14&amp;ll=47.666835,-117.449984&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=2601+west+gardner,+spokane,+wa+99201&amp;aq=&amp;sll=47.650995,-117.423835&amp;sspn=0.012344,0.033023&amp;ie=UTF8&amp;hq=&amp;hnear=2601+W+Gardner,+Spokane,+Washington+99201&amp;t=m&amp;z=14&amp;ll=47.666835,-117.449984" style="color:#0000FF;text-align:left">View Larger Map</a></small>
        </div>

        <div class="col-lg-5">
            <form action="index.php?page=contact" method="post">
                <legend style="border-bottom: 1px solid rgb(99, 85, 11);">Contact us</legend>
                <p>Please feel free to contact us, please include your name and contact information so
                that we can get right back to you!</p>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="8" class="form-control" placeholder="Message" name="message"><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea>
                <div>

                <br><br>

                <div class="form-group">
                    <label>Spam filter -- Answer the question: what does 3 + 1 equal?</label>
                    <input type="text" name="spam_filter" value="<?php if(isset($_POST['spam_filter'])) echo $_POST['spam_filter']; ?>">
                </div>



                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</div>
