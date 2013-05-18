<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mozilla Persona Example App</title>
        <script src="https://login.persona.org/include.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="stylesheet" href="persona-buttons.css" />
        <script src="persona.js"></script>
        <script type="text/javascript">
            <?php if ($session_open) { ?>
                var user_email = '<?php echo $user_email; ?>';
            <?php } else { ?>
                var user_email = null;
            <?php } ?>
        </script>
    </head>
    <body>
        <div>
            <?php if ($session_open) { ?>
                <button id="logout" class ='persona-button dark'><span>Logout</span></button>
                User Session Opened. :) 
				<?php echo $user_email; ?>
            <?php } else { ?>
                <button id="login" class='persona-button dark'><span>Login</span></button>
                User Session Closed. :(
            <?php } ?>
        </div>
    </body>
</html>
