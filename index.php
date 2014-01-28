<!DOCTYPE html>
<html>
        <?php
        ob_start();
        
        require 'web/modules/header.php';
        require 'web/modules/body.php';
        
        $header = new Header();
        echo $header->write();

        $body = new Body( $_GET );
        echo $body->write();
        
        ob_end_flush();
        ?>
</html>
