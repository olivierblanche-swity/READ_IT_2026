<?php





switch ($_GET['contact']):

    case 'show':
        global $title, $content;
        $title = "contact";
        ob_start();
        include '../app/views/templates/contact/contactForm.php';
        $content = ob_get_clean();
        break;

endswitch;
