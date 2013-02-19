<?php
echo $this->Html->css('qrcode');

if (array_key_exists("qrcodefile", $item)){
	$link=$this->Html->url(array('action'=>'view',$item['Item']['id']),true);
	echo '<a href="'.$link.'">'.$this->QrCode->url($link).'</a><br/>';
	echo "\n".$this->Html->url(array('action'=>'view',$item['Item']['id']));
} else {
	foreach ($item as $code){
		$link=$this->Html->url(array('action'=>'view',$code['Item']['id']),true);
		
		echo '<div class="qrbox">';	
		echo "\n".'<a href="'.$link.'">'."\n  ".$this->QrCode->url($link)."\n</a><br/>";
		echo "\n".$this->Html->url(array('action'=>'view',$code['Item']['id']));		
		echo "\n</div>\n";
	}	
	
}