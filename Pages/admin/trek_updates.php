<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Send Trek Updates</title>
    <link rel="stylesheet" type="text/css" href="../../Styles/trek_updates.css">
</head>

<body>
    <div class="container">
        <h1>Send Trek Updates</h1>
        <form>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Send">
        </form>
    </div>

    <script type="text/javascript" src="../../Script/trek_updates_script.js"></script>
</body>

</html>