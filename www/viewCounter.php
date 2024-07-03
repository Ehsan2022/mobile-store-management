<?php
    $ctfile = 'ViewCounter.txt';
    $FILEH = fopen($ctfile, 'r+') or die ("Cannot open $ctfile");
    flock($FILEH, LOCK_EX) or die ("Cannot lock file $outf");
    $ctr = fgets($FILEH, 4096) or die ("Cannot gets $ctfile");
    $ctr = rtrim($ctr, '\n');
    if (is_numeric($ctr)){
        $count= $ctr + 1;
        rewind ($FILEH);
        $ret= fputs($FILEH, $count);
        print ("$count");
    } else {
        print "Error: ctr=$ctr <=not numeric value";
    }
    fclose ($FILEH);
?>