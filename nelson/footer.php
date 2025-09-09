        <?php
            if (!empty($_COOKIE['mensaje'])){
                switch ($_COOKIE['severidad']) {
                    case 1:
                        echo "<div class='alert alert-success'><strong>Atención:</strong> ".$_COOKIE['mensaje']."</div>";
                        break;
                    case 2:
                        echo "<div class='alert alert-info'><strong>Atención:</strong> ".$_COOKIE['mensaje']."</div>";
                        break;
                    case 3:
                        echo "<div class='alert alert-warning'><strong>Atención:</strong> ".$_COOKIE['mensaje']."</div>";
                        break;
                    case 4:
                        echo "<div class='alert alert-danger'><strong>Atención:</strong> ".$_COOKIE['mensaje']."</div>";
                        break;
                    default:
                        echo "<div class='alert alert-secondary'><strong>Atención:</strong> ".$_COOKIE['mensaje']."</div>";
                        break;
                }
            }
        ?>
    </div>
</body>
</html>
<?php
    // End output buffering and flush content
    if (ob_get_level()) {
        ob_end_flush();
    }
?>