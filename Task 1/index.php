<?php
require_once('Results.php');
$index = new ScoreResult();

$index->getCountOfUsersWithinScoreRange(20, 50));
$index->getCountOfUsersWithinScoreRange(-40, 0));
$index->getCountOfUsersWithinScoreRange(0, 80));
$index->getCountOfUsersByCondition('CA', 'w', false, false));
$index->getCountOfUsersByCondition('CA', 'w', false, true));
$index->getCountOfUsersByCondition('CA', 'w', true, true));

echo $index;
