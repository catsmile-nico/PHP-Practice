<?php 
    // connect to db
    $config = parse_ini_file('config.ini'); 
    $db = mysqli_connect("localhost", $config['username'], $config['password'], "todolist");
    unset ($config);  
    
    // add task
    if (isset($_POST['submit'])) {
        $newtask = $_POST['newtask'];
        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$newtask')");
    }

    // delete task
    if (isset($_GET['rem_task'])) {
        $id = $_GET['rem_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
    }

    // get task array
    $tasks = mysqli_query($db, "SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="POST" action="index.php">
        <input id="inputform" type="text" name="newtask" class="task_input" required>
        <button type="submit" name="submit" class="task_btn">Add</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th class="remove">Remove</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($row = mysqli_fetch_array($tasks)) { ?>
            <tr>
                <td class="task" onclick="textToClipboard('<?php echo $row["task"]; ?>')"><?php echo $row['task']; ?></td>
                <td class="remove">
                    <a href="index.php?rem_task=<?php echo $row['id']; ?>">x</a>
                </td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>

<script>
    function textToClipboard(task) {
        var temp = document.createElement("input");
        document.body.appendChild(temp);
        temp.value = task;
        temp.select();
        document.execCommand("copy");
        document.body.removeChild(temp);
        customAlert(task,2000);
    }

    function customAlert(msg,duration) {
        var temp = document.createElement("div");
        temp.innerHTML = "<div class='alertmsg'> COPIED : "+msg+"</div>";
        setTimeout(function() {temp.parentNode.removeChild(temp);},duration);
        document.body.appendChild(temp);
    }

    // FIX : form resubmit on Refresh + always focus input
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        document.getElementById("inputform").focus();
    }
</script>