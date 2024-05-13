<?php

unset($_SESSION['iniciarSesionPaypo']);
unset($_SESSION['idpaypo']);
unset($_SESSION['nombrepaypo']);
unset($_SESSION['apellidopaypo']);
unset($_SESSION['correopaypo']);

echo '<script>
		window.location = "login";
    </script>';