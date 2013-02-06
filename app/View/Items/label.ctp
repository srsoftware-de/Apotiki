<?php
$link=$this->Html->url(array('action'=>'view',$item['Item']['id']),true);
echo '<a href="'.$link.'">'.$this->QrCode->url($link).'</a><br/>';
echo "\n".$this->Html->url(array('action'=>'view',$item['Item']['id']));