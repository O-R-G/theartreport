<?
    // hard-coded root
    $calendar_id = 9;

    // chronological sort
    function date_sort($a, $b) {
        // return strtotime($a['begin']) - strtotime($b['begin']);
        return strtotime($b['begin']) - strtotime($a['begin']);
    }

    $programming = $oo->children($calendar_id);
    usort($programming, "date_sort");

    // exact format for date string comparison
    $now = date('Y-m-d H:i:s');
?>

<!--
<div id="date-time"><?            
    date_default_timezone_set("America/Los_Angeles");
    echo date("m/j/y H:i:s");
?></div>
-->

<div class="asterisks">
    * * *<br /><? 
    date_default_timezone_set("America/Los_Angeles");
    // echo date("m/j/y H:i:s");
?></div>

<div id="right" class="container">
    <div class="content">
        <div class="content-programming"><?
            foreach ($programming as $key=>$program) {
                if (substr($program["name1"],0,1) != ".") {
                    $then = date('Y-m-d H:i:s', strtotime($program['end']));
                    $is_past = ($now > $then) ? true : false;                    
                    if (($past && $is_past) || (!$past && !$is_past) || ($only)) {
                        ?><div class="content-program" target="<?= $program['url'] ?>"><?
                            if ($program['url'] == $item['url']) {
                                require_once("views/calendar-event.php");
                            } else if (!$only) {
                                ?><a href="/calendar/<?= ($past) ? $program['url'] . '?past' : $program['url'] ?>">
                                    <div class="content-program-title <?= ($is_past) ? 'grey' : ''; ?>"><?
                                        echo date('m/j/y', strtotime($program['begin'])) . " " . $program['name1'];
                                        // echo $program['url'];
                                        // echo date('m/j/y', strtotime($program['end'])) . " " . $program['name1'];
                                        // echo $program['name1'];
                                    ?></div>
                                </a><?
                            }
                        ?></div><?
                    }
                }
            }
        ?></div><?
        if ($past || $only) {
            ?><br /><br />
            <a href='/calendar'>Current events ...</a><?
        } else {
            ?><br /><br />
            <a href='/calendar?past'>Past events ...</a><?
        }
    ?></div>
</div>

<!--                                
                                ?><a href="/calendar/?show">
<?= $program['url'] ?>                    
<?= "<br/>" ?>
<?= $item['url'] ?>
-->
