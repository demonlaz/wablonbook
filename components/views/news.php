<?php


foreach ($newsModel as $v){
    echo $v['dateadd'].'</br>';
    echo $v['content']. "(".$v['avtor'].")";
}