<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert</title>
    <link rel="stylesheet" href="../styles/alert.css" />
</head>
<body>
<?php
echo "<section id='alert-section' class='warning invisible'>
        <div id='popup'>
            <div id='alert-title'></div>
            <div id='alert-description'></div>
            <button id='close-btn'>Ok</button>
        </div>
        </section>";
function show_alert($title, $description, $location) {
    echo "<script type='text/javascript'>
        function showAlert(title, description) {
            document.getElementById('alert-title').innerText = title;
            document.getElementById('alert-description').innerText = description;
            document.getElementById('alert-section').classList.remove('invisible');
        }
        showAlert('$title', '$description');
        const closeBtn = document.getElementById('close-btn');
        closeBtn.addEventListener('click', () => {
            document.getElementById('alert-section').classList.add('invisible');
            if('$location' != '') window.location.href = '$location';
        });
    </script>";
}
?>
    
</body>
</html>
