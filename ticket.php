<?php
include('includes/head.php');

if (isset($_GET['ticket'])) {
    $ticketid = $_GET['ticket'];
    $ticketInfo = DB::query('SELECT * FROM tickets WHERE id=:id', array(':id' => $ticketid))[0];

}
if ($ticketInfo['user_id'] != Login::isLoggedIn()) {
    http_response_code(404);
    include('404.php');
    exit;
}
$lastMessageId = DB::query('SELECT id FROM tickets_messages WHERE ticket_id=:ticket_id ORDER BY id DESC LIMIT 1', array(':ticket_id' => $ticketid))[0]['id'];


if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');

    if (strlen($name) >= 3 && strlen($name) <= 128) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            DB::query(
                'INSERT INTO contact VALUES(\'\',:name,:email,:subject,:message,:_date)',
                array(':name' => $name, ':subject' => $subject, ':email' => $email, ':message' => $message, ':_date' => $date)
            );
            echo '<script>alert("Message Sent !")</script>';
            echo '<script>window.location="index.php"</script>';
        } else {
            echo '<script>alert("Error In Email!")</script>';
        }
    } else {
        echo '<script>alert("Error In Name Length!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Product Sans Font -->
    <link rel="stylesheet" href="layout/css/productsans.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="layout/css/master.css">
    <!-- Favicon  -->
    <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
    <!-- Link To Icons File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Hikingify | Messages</title>
</head>

<body id="contact">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner">
        <div class="overlay"></div>
        <div class="content">
            <h1>Messages</h1>
        </div>
    </div>
    <!-- Top Banner END -->

    <!-- Contact START  -->

    <div class="def-container">
        <div class="messages-content">
            <div class="message-box">
                <h1>Opened Ticket: <?php echo $ticketInfo['subject']; ?></h1>
                <hr>
                <div class="whole-messages" id="messages-container" data-last-id="<?php echo $lastMessageId;?>" data-ticket-id="<?php echo $ticketid; ?>" data-img="<?php echo $image; ?>" data-name="<?php echo $fullname; ?>">
                    <?php
                    $ticketMessages = DB::query('SELECT * FROM tickets_messages WHERE ticket_id=:ticket_id', array(':ticket_id' => $ticketid));
                    foreach ($ticketMessages as $singleMessage) {
                        $senderData = DB::query('SELECT * FROM users WHERE id=:id', array(':id' => $singleMessage['user_id']))[0];
                        $timeInAgo = timeago($singleMessage['_date']);
                    ?>

                        <div class="single-message">
                            <div class="message-sender flex mb-10">
                                <div class="sender-image">
                                    <img src="userImgs/<?php echo $senderData['image']; ?>" alt="">
                                </div>
                                <div class="sender-info">
                                    <p><?php echo $senderData['fullname']; ?></p>
                                    <i><?php echo $timeInAgo; ?></i>
                                </div>
                            </div>
                            <div class="message-content">
                                <p>
                                    <?php echo $singleMessage['message']; ?>
                                </p>
                            </div>
                        </div>

                        <hr>
                    <?php } ?>
                </div>
                <div class="message-send">
                    <textarea name="message" id="message" cols="30" rows="5" class="messages-textarea" placeholder="Enter Your Message Here ..." required></textarea>
                    <button class="xbutton" type="submit" name="send" onclick="sendMessage()">
                        Send Message
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <script>
        var message = document.getElementById('message');
        var messageContainer = document.getElementById('messages-container');

        function createMessage(text, name, img) {
            var single_message = document.createElement('div');
            single_message.classList.add('single-message');
            var message_sender = document.createElement('div');
            message_sender.classList.add('message-sender');
            message_sender.classList.add('flex');
            message_sender.classList.add('mb-10');
            var sender_image = document.createElement('div');
            sender_image.classList.add('sender-image');
            var sender_image_img = document.createElement('img');
            sender_image_img.src = "userImgs/" + img;
            var sender_info = document.createElement('div');
            sender_info.classList.add('sender-info');
            var sender_name = document.createElement('p');
            sender_name.innerHTML = name;
            var time_ago = document.createElement('i');
            time_ago.innerHTML = "Just now";
            var message_content = document.createElement('div');
            message_content.classList.add('message-content');
            var message_content_text = document.createElement('p');
            message_content_text.innerHTML = text;
            sender_image.appendChild(sender_image_img);
            sender_info.appendChild(sender_name);
            sender_info.appendChild(time_ago);
            message_sender.appendChild(sender_image);
            message_sender.appendChild(sender_info);
            message_content.appendChild(message_content_text);
            single_message.appendChild(message_sender);
            single_message.appendChild(message_content);
            messageContainer.appendChild(single_message);
        }

        function sendMessage() {
            var xhttp = new XMLHttpRequest();
            messageValue = message.value;
            message.value = "";
            createMessage(messageValue, messageContainer.getAttribute('data-name'), messageContainer.getAttribute('data-img'));
            var ticketid = <?php echo $ticketid; ?>;
            xhttp.open("GET", "sendMessage.php?msg=" + messageValue + "&id=" + ticketid, true);
            xhttp.send();
        }

        function getMessages(data) {
            data = data['data'];
            if(!data) return;
            createMessage(data['message'], data['name'], data['image']);
            messageContainer.setAttribute('data-last-id',data['id']);
        }

        setInterval(function() {
            const message_id = messageContainer.getAttribute('data-last-id');
            const ticket_id = messageContainer.getAttribute('data-ticket-id');
            const data = "ticket=" + ticket_id + "&id=" + message_id;
            send_request("POST", 'functions/getMessages.php', data, getMessages);
        }, 1000);
    </script>
    <!-- Footer END -->
</body>

</html>