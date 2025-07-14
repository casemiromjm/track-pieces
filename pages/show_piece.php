<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../templates/common.php');

$session = new Session();

$piece = $session->get('piece');
$session->unset('piece');

drawHead();

echo 'im showing a piece :)';
?>

<?php
drawFoot();
?>
