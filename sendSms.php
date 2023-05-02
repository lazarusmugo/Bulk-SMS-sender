<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Africa's Talking SMS Sender</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <h1>Africa's Talking Bulk SMS Sender</h1>
    <form action="send_sms.php" method="POST">
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
            <label for="single">
                <input type="radio" id="single" name="send_to" value="single" checked>
                Send to a Single Number
            </label>

            <label for="bulk">
                <input type="radio" id="bulk" name="send_to" value="bulk">
                Send to Many Numbers
            </label>
        </div>
        <div id="single-input">
            <input type="text" name="phone_number" placeholder="Phone Number">
        </div>
        <div id="phone-inputs" class="phone-inputs">
            <input type="text" name="phone_numbers[]" placeholder="Phone Number">
            <input type="text" name="phone_numbers[]" placeholder="Phone Number">

            <button id="add-phone">Add another phone number</button>
            <br>
        </div>
        <textarea id="message" name="message" placeholder="Enter your message" rows="5" cols="40" required></textarea>

        <input type="submit" value="Send">
    </form>

    <script src="script.js"></script>
</body>

</html>