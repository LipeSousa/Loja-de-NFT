
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION["id"])) {
        die("<div class='protect'>
        <div>Você não está conectado, clique aqui para logar. <a href=\"login.php\"><i class='bx bx-log-in-circle'></i></a></div>
        </div>");
    }
    ?>
    