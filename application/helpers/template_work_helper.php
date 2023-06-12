<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function card_open($title_card,$style="",$expand=true,$attr=""){
	$ex='';
	if($expand !==true){
		$ex = 'card-collapsed';
	}
	
	$card = '<div class="card '.$ex.'" ' .$attr.' >'.
			 '<div class="card-status '.$style.'"></div>'.
                  '<div class="card-header">'.
                    '<h3 class="card-title">'.$title_card.'</h3>'.
                    '<div class="card-options">'.
                      '<a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>'.
					  '<a href="javascript:void(0)" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>'.
                    '</div>'.
                  '</div>'.
                  '<div class="card-body">';
                 
	return $card;
}

function card_close(){
	$m = '</div>'.
         '</div>';
	return $m;	 
}

/**
*
*
*/
function button_card($title1,$title2,$style_text,$style_button,$icon,$style_icon,$id='',$link='javascript:void(0)'){
	$m = '<a  href="'.$link.'" id="'.$id.'" class="card p-3 btn btn-card '.$style_button.'" >'.
         '<div class="d-flex align-items-center">'.
            '<span class="stamp stamp-md '.$style_icon.' mr-3">'.
            '<i class="'.$icon.'"></i>'.
            '</span>'.
            '<div class="text-left">'.
            '<p class="m-0 '.$style_text.'"> '.$title1.'</p>'.
            '<small class="text-muted"> '.$title2.'</small>'.
            '</div>'.
         '</div>'.
         '</a>';
	return $m;
}


function menu_parent_open($title,$icon,$link='',$active=false,$haschild=false,$id=""){
	$ac = '';
	$data_toggle =''; 
	$data_dropdown ='';
	if( $link == 'javascript:void(0)'){
		$data_dropdown= 'treeview';
		$data_toggle =  "		<span class=\"pull-right-container\">				\n".
						" 			<i class=\"fa fa-angle-left pull-right\"></i>	\n".
						"		</span>"; 
	}
	
	// if($id=='ybs-dash'){
		// $data_dropdown ='';
		// $data_toggle="";
	// }
	
	if(!$haschild){
		$data_dropdown ='';
		$data_toggle="";
	}
	
	if($active){
		$ac = 'active'	;
	}
	
	$m = 	"	<li class=\"$data_dropdown  $ac\" >							\n".
			"	<a href=\"$link\">											\n".
			"		<i class=\"$icon\" id='$id'></i> <span>$title</span>   	\n".
			"		$data_toggle											\n".			
			"	</a>";
	
	return $m;
}

function menu_parent_close(){
	$m = "</li>	\n";
	return $m;
}

function menu_child_open(){
	$m ='<ul class="treeview-menu">'."\n";
	return $m;
} 

function menu_child_close(){
	$m='</ul>'."\n";
	return $m;
}

function create_menu_child($title,$link,$icon,$active){
	$ac='';
	if($active){
		$ac = 'active'	;
	}
	
	$m =" <li class=\"$ac \" ><a href=\"$link\"><i class=\"$icon \"></i> $title </a></li>		\n";	 
	return $m;
}


function create_select_icon($id_select,$list_class=""){
	
	$a= '<select id="'.$id_select.'" name="icon" class="form-control data-sending select2 select2-icon" style="width: 100%;">
		<option value="#"  data-icon=\'{"icon": "# "}\'>--pilih icon-- </option>
		<option value="fe fe-activity"  data-icon=\'{"icon": "fe fe-activity "}\'>fe fe-activity</option>
		<option value="fe fe-airplay"  data-icon=\'{"icon": "fe fe-airplay "}\'>fe fe-airplay </option>
		<option value="fe fe-alert-circle"  data-icon=\'{"icon": "fe fe-alert-circle "}\'>fe fe-alert-circle </option>
		<option value="fe fe-alert-octagon"  data-icon=\'{"icon": "fe fe-alert-octagon "}\'>fe fe-alert-octagon </option>
		<option value="fe fe-alert-triangle"  data-icon=\'{"icon": "fe fe-alert-triangle "}\'>fe fe-alert-triangle </option>
		<option value="fe fe-align-center"  data-icon=\'{"icon": "fe fe-align-center "}\'>fe fe-align-center </option>
		<option value="fe fe-align-justify"  data-icon=\'{"icon": "fe fe-align-justify "}\'>fe fe-align-justify </option>
		<option value="fe fe-align-left"  data-icon=\'{"icon": "fe fe-align-left "}\'>fe fe-align-left </option>
		<option value="fe fe-align-right"  data-icon=\'{"icon": "fe fe-align-right "}\'>fe fe-align-right </option>
		<option value="fe fe-anchor"  data-icon=\'{"icon": "fe fe-anchor "}\'>fe fe-anchor </option>
		<option value="fe fe-aperture"  data-icon=\'{"icon": "fe fe-aperture "}\'>fe fe-aperture </option>
		<option value="fe fe-arrow-down"  data-icon=\'{"icon": "fe fe-arrow-down "}\'>fe fe-arrow-down </option>
		<option value="fe fe-arrow-down-circle"  data-icon=\'{"icon": "fe fe-arrow-down-circle "}\'>fe fe-arrow-down-circle </option>
		<option value="fe fe-arrow-down-left"  data-icon=\'{"icon": "fe fe-arrow-down-left "}\'>fe fe-arrow-down-left </option>
		<option value="fe fe-arrow-down-right"  data-icon=\'{"icon": "fe fe-arrow-down-right "}\'>fe fe-arrow-down-right </option>
		<option value="fe fe-arrow-left"  data-icon=\'{"icon": "fe fe-arrow-left "}\'>fe fe-arrow-left </option>
		<option value="fe fe-arrow-left-circle"  data-icon=\'{"icon": "fe fe-arrow-left-circle "}\'>fe fe-arrow-left-circle </option>
		<option value="fe fe-arrow-right"  data-icon=\'{"icon": "fe fe-arrow-right "}\'>fe fe-arrow-right </option>
		<option value="fe fe-arrow-right-circle"  data-icon=\'{"icon": "fe fe-arrow-right-circle "}\'>fe fe-arrow-right-circle </option>
		<option value="fe fe-arrow-up"  data-icon=\'{"icon": "fe fe-arrow-up "}\'>fe fe-arrow-up </option>
		<option value="fe fe-arrow-up-circle"  data-icon=\'{"icon": "fe fe-arrow-up-circle "}\'>fe fe-arrow-up-circle </option>
		<option value="fe fe-arrow-up-left"  data-icon=\'{"icon": "fe fe-arrow-up-left "}\'>fe fe-arrow-up-left </option>
		<option value="fe fe-arrow-up-right"  data-icon=\'{"icon": "fe fe-arrow-up-right "}\'>fe fe-arrow-up-right </option>
		<option value="fe fe-at-sign"  data-icon=\'{"icon": "fe fe-at-sign "}\'>fe fe-at-sign </option>
		<option value="fe fe-award"  data-icon=\'{"icon": "fe fe-award "}\'>fe fe-award </option>
		<option value="fe fe-bar-chart"  data-icon=\'{"icon": "fe fe-bar-chart "}\'>fe fe-bar-chart </option>
		<option value="fe fe-bar-chart-2"  data-icon=\'{"icon": "fe fe-bar-chart-2 "}\'>fe fe-bar-chart-2 </option>
		<option value="fe fe-battery"  data-icon=\'{"icon": "fe fe-battery "}\'>fe fe-battery </option>
		<option value="fe fe-battery-charging"  data-icon=\'{"icon": "fe fe-battery-charging "}\'>fe fe-battery-charging </option>
		<option value="fe fe-bell"  data-icon=\'{"icon": "fe fe-bell "}\'>fe fe-bell </option>
		<option value="fe fe-bell-off"  data-icon=\'{"icon": "fe fe-bell-off "}\'>fe fe-bell-off </option>
		<option value="fe fe-bluetooth"  data-icon=\'{"icon": "fe fe-bluetooth "}\'>fe fe-bluetooth </option>
		<option value="fe fe-bold"  data-icon=\'{"icon": "fe fe-bold "}\'>fe fe-bold </option>
		<option value="fe fe-book"  data-icon=\'{"icon": "fe fe-book "}\'>fe fe-book </option>
		<option value="fe fe-book-open"  data-icon=\'{"icon": "fe fe-book-open "}\'>fe fe-book-open </option>
		<option value="fe fe-bookmark"  data-icon=\'{"icon": "fe fe-bookmark "}\'>fe fe-bookmark </option>
		<option value="fe fe-box"  data-icon=\'{"icon": "fe fe-box "}\'>fe fe-box </option>
		<option value="fe fe-briefcase"  data-icon=\'{"icon": "fe fe-briefcase "}\'>fe fe-briefcase </option>
		<option value="fe fe-calendar"  data-icon=\'{"icon": "fe fe-calendar "}\'>fe fe-calendar </option>
		<option value="fe fe-camera"  data-icon=\'{"icon": "fe fe-camera "}\'>fe fe-camera </option>
		<option value="fe fe-camera-off"  data-icon=\'{"icon": "fe fe-camera-off "}\'>fe fe-camera-off </option>
		<option value="fe fe-cast"  data-icon=\'{"icon": "fe fe-cast "}\'>fe fe-cast </option>
		<option value="fe fe-check"  data-icon=\'{"icon": "fe fe-check "}\'>fe fe-check </option>
		<option value="fe fe-check-circle"  data-icon=\'{"icon": "fe fe-check-circle "}\'>fe fe-check-circle </option>
		<option value="fe fe-check-square"  data-icon=\'{"icon": "fe fe-check-square "}\'>fe fe-check-square </option>
		<option value="fe fe-chevron-down"  data-icon=\'{"icon": "fe fe-chevron-down "}\'>fe fe-chevron-down </option>
		<option value="fe fe-chevron-left"  data-icon=\'{"icon": "fe fe-chevron-left "}\'>fe fe-chevron-left </option>
		<option value="fe fe-chevron-right"  data-icon=\'{"icon": "fe fe-chevron-right "}\'>fe fe-chevron-right </option>
		<option value="fe fe-chevron-up"  data-icon=\'{"icon": "fe fe-chevron-up "}\'>fe fe-chevron-up </option>
		<option value="fe fe-chevrons-down"  data-icon=\'{"icon": "fe fe-chevrons-down "}\'>fe fe-chevrons-down </option>
		<option value="fe fe-chevrons-left"  data-icon=\'{"icon": "fe fe-chevrons-left "}\'>fe fe-chevrons-left </option>
		<option value="fe fe-chevrons-right"  data-icon=\'{"icon": "fe fe-chevrons-right "}\'>fe fe-chevrons-right </option>
		<option value="fe fe-chevrons-up"  data-icon=\'{"icon": "fe fe-chevrons-up "}\'>fe fe-chevrons-up </option>
		<option value="fe fe-chrome"  data-icon=\'{"icon": "fe fe-chrome "}\'>fe fe-chrome </option>
		<option value="fe fe-circle"  data-icon=\'{"icon": "fe fe-circle "}\'>fe fe-circle </option>
		<option value="fe fe-clipboard"  data-icon=\'{"icon": "fe fe-clipboard "}\'>fe fe-clipboard </option>
		<option value="fe fe-clock"  data-icon=\'{"icon": "fe fe-clock "}\'>fe fe-clock </option>
		<option value="fe fe-cloud"  data-icon=\'{"icon": "fe fe-cloud "}\'>fe fe-cloud </option>
		<option value="fe fe-cloud-drizzle"  data-icon=\'{"icon": "fe fe-cloud-drizzle "}\'>fe fe-cloud-drizzle </option>
		<option value="fe fe-cloud-lightning"  data-icon=\'{"icon": "fe fe-cloud-lightning "}\'>fe fe-cloud-lightning </option>
		<option value="fe fe-cloud-off"  data-icon=\'{"icon": "fe fe-cloud-off "}\'>fe fe-cloud-off </option>
		<option value="fe fe-cloud-rain"  data-icon=\'{"icon": "fe fe-cloud-rain "}\'>fe fe-cloud-rain </option>
		<option value="fe fe-cloud-snow"  data-icon=\'{"icon": "fe fe-cloud-snow "}\'>fe fe-cloud-snow </option>
		<option value="fe fe-code"  data-icon=\'{"icon": "fe fe-code "}\'>fe fe-code </option>
		<option value="fe fe-codepen"  data-icon=\'{"icon": "fe fe-codepen "}\'>fe fe-codepen </option>
		<option value="fe fe-command"  data-icon=\'{"icon": "fe fe-command "}\'>fe fe-command </option>
		<option value="fe fe-compass"  data-icon=\'{"icon": "fe fe-compass "}\'>fe fe-compass </option>
		<option value="fe fe-copy"  data-icon=\'{"icon": "fe fe-copy "}\'>fe fe-copy </option>
		<option value="fe fe-corner-down-left"  data-icon=\'{"icon": "fe fe-corner-down-left "}\'>fe fe-corner-down-left </option>
		<option value="fe fe-corner-down-right"  data-icon=\'{"icon": "fe fe-corner-down-right "}\'>fe fe-corner-down-right </option>
		<option value="fe fe-corner-left-down"  data-icon=\'{"icon": "fe fe-corner-left-down "}\'>fe fe-corner-left-down </option>
		<option value="fe fe-corner-left-up"  data-icon=\'{"icon": "fe fe-corner-left-up "}\'>fe fe-corner-left-up </option>
		<option value="fe fe-corner-right-down"  data-icon=\'{"icon": "fe fe-corner-right-down "}\'>fe fe-corner-right-down </option>
		<option value="fe fe-corner-right-up"  data-icon=\'{"icon": "fe fe-corner-right-up "}\'>fe fe-corner-right-up </option>
		<option value="fe fe-corner-up-left"  data-icon=\'{"icon": "fe fe-corner-up-left "}\'>fe fe-corner-up-left </option>
		<option value="fe fe-corner-up-right"  data-icon=\'{"icon": "fe fe-corner-up-right "}\'>fe fe-corner-up-right </option>
		<option value="fe fe-cpu"  data-icon=\'{"icon": "fe fe-cpu "}\'>fe fe-cpu </option>
		<option value="fe fe-credit-card"  data-icon=\'{"icon": "fe fe-credit-card "}\'>fe fe-credit-card </option>
		<option value="fe fe-crop"  data-icon=\'{"icon": "fe fe-crop "}\'>fe fe-crop </option>
		<option value="fe fe-crosshair"  data-icon=\'{"icon": "fe fe-crosshair "}\'>fe fe-crosshair </option>
		<option value="fe fe-database"  data-icon=\'{"icon": "fe fe-database "}\'>fe fe-database </option>
		<option value="fe fe-delete"  data-icon=\'{"icon": "fe fe-delete "}\'>fe fe-delete </option>
		<option value="fe fe-disc"  data-icon=\'{"icon": "fe fe-disc "}\'>fe fe-disc </option>
		<option value="fe fe-dollar-sign"  data-icon=\'{"icon": "fe fe-dollar-sign "}\'>fe fe-dollar-sign </option>
		<option value="fe fe-download"  data-icon=\'{"icon": "fe fe-download "}\'>fe fe-download </option>
		<option value="fe fe-download-cloud"  data-icon=\'{"icon": "fe fe-download-cloud "}\'>fe fe-download-cloud </option>
		<option value="fe fe-droplet"  data-icon=\'{"icon": "fe fe-droplet "}\'>fe fe-droplet </option>
		<option value="fe fe-edit"  data-icon=\'{"icon": "fe fe-edit "}\'>fe fe-edit </option>
		<option value="fe fe-edit-2"  data-icon=\'{"icon": "fe fe-edit-2 "}\'>fe fe-edit-2 </option>
		<option value="fe fe-edit-3"  data-icon=\'{"icon": "fe fe-edit-3 "}\'>fe fe-edit-3 </option>
		<option value="fe fe-external-link"  data-icon=\'{"icon": "fe fe-external-link "}\'>fe fe-external-link </option>
		<option value="fe fe-eye"  data-icon=\'{"icon": "fe fe-eye "}\'>fe fe-eye </option>
		<option value="fe fe-eye-off"  data-icon=\'{"icon": "fe fe-eye-off "}\'>fe fe-eye-off </option>
		<option value="fe fe-facebook"  data-icon=\'{"icon": "fe fe-facebook "}\'>fe fe-facebook </option>
		<option value="fe fe-fast-forward"  data-icon=\'{"icon": "fe fe-fast-forward "}\'>fe fe-fast-forward </option>
		<option value="fe fe-feather"  data-icon=\'{"icon": "fe fe-feather "}\'>fe fe-feather </option>
		<option value="fe fe-file"  data-icon=\'{"icon": "fe fe-file "}\'>fe fe-file </option>
		<option value="fe fe-file-minus"  data-icon=\'{"icon": "fe fe-file-minus "}\'>fe fe-file-minus </option>
		<option value="fe fe-file-plus"  data-icon=\'{"icon": "fe fe-file-plus "}\'>fe fe-file-plus </option>
		<option value="fe fe-file-text"  data-icon=\'{"icon": "fe fe-file-text "}\'>fe fe-file-text </option>
		<option value="fe fe-film"  data-icon=\'{"icon": "fe fe-film "}\'>fe fe-film </option>
		<option value="fe fe-filter"  data-icon=\'{"icon": "fe fe-filter "}\'>fe fe-filter </option>
		<option value="fe fe-flag"  data-icon=\'{"icon": "fe fe-flag "}\'>fe fe-flag </option>
		<option value="fe fe-folder"  data-icon=\'{"icon": "fe fe-folder "}\'>fe fe-folder </option>
		<option value="fe fe-folder-minus"  data-icon=\'{"icon": "fe fe-folder-minus "}\'>fe fe-folder-minus </option>
		<option value="fe fe-folder-plus"  data-icon=\'{"icon": "fe fe-folder-plus "}\'>fe fe-folder-plus </option>
		<option value="fe fe-git-branch"  data-icon=\'{"icon": "fe fe-git-branch "}\'>fe fe-git-branch </option>
		<option value="fe fe-git-commit"  data-icon=\'{"icon": "fe fe-git-commit "}\'>fe fe-git-commit </option>
		<option value="fe fe-git-merge"  data-icon=\'{"icon": "fe fe-git-merge "}\'>fe fe-git-merge </option>
		<option value="fe fe-git-pull-request"  data-icon=\'{"icon": "fe fe-git-pull-request "}\'>fe fe-git-pull-request </option>
		<option value="fe fe-github"  data-icon=\'{"icon": "fe fe-github "}\'>fe fe-github </option>
		<option value="fe fe-gitlab"  data-icon=\'{"icon": "fe fe-gitlab "}\'>fe fe-gitlab </option>
		<option value="fe fe-globe"  data-icon=\'{"icon": "fe fe-globe "}\'>fe fe-globe </option>
		<option value="fe fe-grid"  data-icon=\'{"icon": "fe fe-grid "}\'>fe fe-grid </option>
		<option value="fe fe-hard-drive"  data-icon=\'{"icon": "fe fe-hard-drive "}\'>fe fe-hard-drive </option>
		<option value="fe fe-hash"  data-icon=\'{"icon": "fe fe-hash "}\'>fe fe-hash </option>
		<option value="fe fe-headphones"  data-icon=\'{"icon": "fe fe-headphones "}\'>fe fe-headphones </option>
		<option value="fe fe-heart"  data-icon=\'{"icon": "fe fe-heart "}\'>fe fe-heart </option>
		<option value="fe fe-help-circle"  data-icon=\'{"icon": "fe fe-help-circle "}\'>fe fe-help-circle </option>
		<option value="fe fe-home"  data-icon=\'{"icon": "fe fe-home "}\'>fe fe-home </option>
		<option value="fe fe-image"  data-icon=\'{"icon": "fe fe-image "}\'>fe fe-image </option>
		<option value="fe fe-inbox"  data-icon=\'{"icon": "fe fe-inbox "}\'>fe fe-inbox </option>
		<option value="fe fe-info"  data-icon=\'{"icon": "fe fe-info "}\'>fe fe-info </option>
		<option value="fe fe-instagram"  data-icon=\'{"icon": "fe fe-instagram "}\'>fe fe-instagram </option>
		<option value="fe fe-italic"  data-icon=\'{"icon": "fe fe-italic "}\'>fe fe-italic </option>
		<option value="fe fe-layers"  data-icon=\'{"icon": "fe fe-layers "}\'>fe fe-layers </option>
		<option value="fe fe-layout"  data-icon=\'{"icon": "fe fe-layout "}\'>fe fe-layout </option>
		<option value="fe fe-life-buoy"  data-icon=\'{"icon": "fe fe-life-buoy "}\'>fe fe-life-buoy </option>
		<option value="fe fe-link"  data-icon=\'{"icon": "fe fe-link "}\'>fe fe-link </option>
		<option value="fe fe-link-2"  data-icon=\'{"icon": "fe fe-link-2 "}\'>fe fe-link-2 </option>
		<option value="fe fe-linkedin"  data-icon=\'{"icon": "fe fe-linkedin "}\'>fe fe-linkedin </option>
		<option value="fe fe-list"  data-icon=\'{"icon": "fe fe-list "}\'>fe fe-list </option>
		<option value="fe fe-loader"  data-icon=\'{"icon": "fe fe-loader "}\'>fe fe-loader </option>
		<option value="fe fe-lock"  data-icon=\'{"icon": "fe fe-lock "}\'>fe fe-lock </option>
		<option value="fe fe-log-in"  data-icon=\'{"icon": "fe fe-log-in "}\'>fe fe-log-in </option>
		<option value="fe fe-log-out"  data-icon=\'{"icon": "fe fe-log-out "}\'>fe fe-log-out </option>
		<option value="fe fe-mail"  data-icon=\'{"icon": "fe fe-mail "}\'>fe fe-mail </option>
		<option value="fe fe-map"  data-icon=\'{"icon": "fe fe-map "}\'>fe fe-map </option>
		<option value="fe fe-map-pin"  data-icon=\'{"icon": "fe fe-map-pin "}\'>fe fe-map-pin </option>
		<option value="fe fe-maximize"  data-icon=\'{"icon": "fe fe-maximize "}\'>fe fe-maximize </option>
		<option value="fe fe-maximize-2"  data-icon=\'{"icon": "fe fe-maximize-2 "}\'>fe fe-maximize-2 </option>
		<option value="fe fe-menu"  data-icon=\'{"icon": "fe fe-menu "}\'>fe fe-menu </option>
		<option value="fe fe-message-circle"  data-icon=\'{"icon": "fe fe-message-circle "}\'>fe fe-message-circle </option>
		<option value="fe fe-message-square"  data-icon=\'{"icon": "fe fe-message-square "}\'>fe fe-message-square </option>
		<option value="fe fe-mic"  data-icon=\'{"icon": "fe fe-mic "}\'>fe fe-mic </option>
		<option value="fe fe-mic-off"  data-icon=\'{"icon": "fe fe-mic-off "}\'>fe fe-mic-off </option>
		<option value="fe fe-minimize"  data-icon=\'{"icon": "fe fe-minimize "}\'>fe fe-minimize </option>
		<option value="fe fe-minimize-2"  data-icon=\'{"icon": "fe fe-minimize-2 "}\'>fe fe-minimize-2 </option>
		<option value="fe fe-minus"  data-icon=\'{"icon": "fe fe-minus "}\'>fe fe-minus </option>
		<option value="fe fe-minus-circle"  data-icon=\'{"icon": "fe fe-minus-circle "}\'>fe fe-minus-circle </option>
		<option value="fe fe-minus-square"  data-icon=\'{"icon": "fe fe-minus-square "}\'>fe fe-minus-square </option>
		<option value="fe fe-monitor"  data-icon=\'{"icon": "fe fe-monitor "}\'>fe fe-monitor </option>
		<option value="fe fe-moon"  data-icon=\'{"icon": "fe fe-moon "}\'>fe fe-moon </option>
		<option value="fe fe-more-horizontal"  data-icon=\'{"icon": "fe fe-more-horizontal "}\'>fe fe-more-horizontal </option>
		<option value="fe fe-more-vertical"  data-icon=\'{"icon": "fe fe-more-vertical "}\'>fe fe-more-vertical </option>
		<option value="fe fe-move"  data-icon=\'{"icon": "fe fe-move "}\'>fe fe-move </option>
		<option value="fe fe-music"  data-icon=\'{"icon": "fe fe-music "}\'>fe fe-music </option>
		<option value="fe fe-navigation"  data-icon=\'{"icon": "fe fe-navigation "}\'>fe fe-navigation </option>
		<option value="fe fe-navigation-2"  data-icon=\'{"icon": "fe fe-navigation-2 "}\'>fe fe-navigation-2 </option>
		<option value="fe fe-octagon"  data-icon=\'{"icon": "fe fe-octagon "}\'>fe fe-octagon </option>
		<option value="fe fe-package"  data-icon=\'{"icon": "fe fe-package "}\'>fe fe-package </option>
		<option value="fe fe-paperclip"  data-icon=\'{"icon": "fe fe-paperclip "}\'>fe fe-paperclip </option>
		<option value="fe fe-pause"  data-icon=\'{"icon": "fe fe-pause "}\'>fe fe-pause </option>
		<option value="fe fe-pause-circle"  data-icon=\'{"icon": "fe fe-pause-circle "}\'>fe fe-pause-circle </option>
		<option value="fe fe-percent"  data-icon=\'{"icon": "fe fe-percent "}\'>fe fe-percent </option>
		<option value="fe fe-phone"  data-icon=\'{"icon": "fe fe-phone "}\'>fe fe-phone </option>
		<option value="fe fe-phone-call"  data-icon=\'{"icon": "fe fe-phone-call "}\'>fe fe-phone-call </option>
		<option value="fe fe-phone-forwarded"  data-icon=\'{"icon": "fe fe-phone-forwarded "}\'>fe fe-phone-forwarded </option>
		<option value="fe fe-phone-incoming"  data-icon=\'{"icon": "fe fe-phone-incoming "}\'>fe fe-phone-incoming </option>
		<option value="fe fe-phone-missed"  data-icon=\'{"icon": "fe fe-phone-missed "}\'>fe fe-phone-missed </option>
		<option value="fe fe-phone-off"  data-icon=\'{"icon": "fe fe-phone-off "}\'>fe fe-phone-off </option>
		<option value="fe fe-phone-outgoing"  data-icon=\'{"icon": "fe fe-phone-outgoing "}\'>fe fe-phone-outgoing </option>
		<option value="fe fe-pie-chart"  data-icon=\'{"icon": "fe fe-pie-chart "}\'>fe fe-pie-chart </option>
		<option value="fe fe-play"  data-icon=\'{"icon": "fe fe-play "}\'>fe fe-play </option>
		<option value="fe fe-play-circle"  data-icon=\'{"icon": "fe fe-play-circle "}\'>fe fe-play-circle </option>
		<option value="fe fe-plus"  data-icon=\'{"icon": "fe fe-plus "}\'>fe fe-plus </option>
		<option value="fe fe-plus-circle"  data-icon=\'{"icon": "fe fe-plus-circle "}\'>fe fe-plus-circle </option>
		<option value="fe fe-plus-square"  data-icon=\'{"icon": "fe fe-plus-square "}\'>fe fe-plus-square </option>
		<option value="fe fe-pocket"  data-icon=\'{"icon": "fe fe-pocket "}\'>fe fe-pocket </option>
		<option value="fe fe-power"  data-icon=\'{"icon": "fe fe-power "}\'>fe fe-power </option>
		<option value="fe fe-printer"  data-icon=\'{"icon": "fe fe-printer "}\'>fe fe-printer </option>
		<option value="fe fe-radio"  data-icon=\'{"icon": "fe fe-radio "}\'>fe fe-radio </option>
		<option value="fe fe-refresh-ccw"  data-icon=\'{"icon": "fe fe-refresh-ccw "}\'>fe fe-refresh-ccw </option>
		<option value="fe fe-refresh-cw"  data-icon=\'{"icon": "fe fe-refresh-cw "}\'>fe fe-refresh-cw </option>
		<option value="fe fe-repeat"  data-icon=\'{"icon": "fe fe-repeat "}\'>fe fe-repeat </option>
		<option value="fe fe-rewind"  data-icon=\'{"icon": "fe fe-rewind "}\'>fe fe-rewind </option>
		<option value="fe fe-rotate-ccw"  data-icon=\'{"icon": "fe fe-rotate-ccw "}\'>fe fe-rotate-ccw </option>
		<option value="fe fe-rotate-cw"  data-icon=\'{"icon": "fe fe-rotate-cw "}\'>fe fe-rotate-cw </option>
		<option value="fe fe-rss"  data-icon=\'{"icon": "fe fe-rss "}\'>fe fe-rss </option>
		<option value="fe fe-save"  data-icon=\'{"icon": "fe fe-save "}\'>fe fe-save </option>
		<option value="fe fe-scissors"  data-icon=\'{"icon": "fe fe-scissors "}\'>fe fe-scissors </option>
		<option value="fe fe-search"  data-icon=\'{"icon": "fe fe-search "}\'>fe fe-search </option>
		<option value="fe fe-send"  data-icon=\'{"icon": "fe fe-send "}\'>fe fe-send </option>
		<option value="fe fe-server"  data-icon=\'{"icon": "fe fe-server "}\'>fe fe-server </option>
		<option value="fe fe-settings"  data-icon=\'{"icon": "fe fe-settings "}\'>fe fe-settings </option>
		<option value="fe fe-share"  data-icon=\'{"icon": "fe fe-share "}\'>fe fe-share </option>
		<option value="fe fe-share-2"  data-icon=\'{"icon": "fe fe-share-2 "}\'>fe fe-share-2 </option>
		<option value="fe fe-shield"  data-icon=\'{"icon": "fe fe-shield "}\'>fe fe-shield </option>
		<option value="fe fe-shield-off"  data-icon=\'{"icon": "fe fe-shield-off "}\'>fe fe-shield-off </option>
		<option value="fe fe-shopping-bag"  data-icon=\'{"icon": "fe fe-shopping-bag "}\'>fe fe-shopping-bag </option>
		<option value="fe fe-shopping-cart"  data-icon=\'{"icon": "fe fe-shopping-cart "}\'>fe fe-shopping-cart </option>
		<option value="fe fe-shuffle"  data-icon=\'{"icon": "fe fe-shuffle "}\'>fe fe-shuffle </option>
		<option value="fe fe-sidebar"  data-icon=\'{"icon": "fe fe-sidebar "}\'>fe fe-sidebar </option>
		<option value="fe fe-skip-back"  data-icon=\'{"icon": "fe fe-skip-back "}\'>fe fe-skip-back </option>
		<option value="fe fe-skip-forward"  data-icon=\'{"icon": "fe fe-skip-forward "}\'>fe fe-skip-forward </option>
		<option value="fe fe-slack"  data-icon=\'{"icon": "fe fe-slack "}\'>fe fe-slack </option>
		<option value="fe fe-slash"  data-icon=\'{"icon": "fe fe-slash "}\'>fe fe-slash </option>
		<option value="fe fe-sliders"  data-icon=\'{"icon": "fe fe-sliders "}\'>fe fe-sliders </option>
		<option value="fe fe-smartphone"  data-icon=\'{"icon": "fe fe-smartphone "}\'>fe fe-smartphone </option>
		<option value="fe fe-speaker"  data-icon=\'{"icon": "fe fe-speaker "}\'>fe fe-speaker </option>
		<option value="fe fe-square"  data-icon=\'{"icon": "fe fe-square "}\'>fe fe-square </option>
		<option value="fe fe-star"  data-icon=\'{"icon": "fe fe-star "}\'>fe fe-star </option>
		<option value="fe fe-stop-circle"  data-icon=\'{"icon": "fe fe-stop-circle "}\'>fe fe-stop-circle </option>
		<option value="fe fe-sun"  data-icon=\'{"icon": "fe fe-sun "}\'>fe fe-sun </option>
		<option value="fe fe-sunrise"  data-icon=\'{"icon": "fe fe-sunrise "}\'>fe fe-sunrise </option>
		<option value="fe fe-sunset"  data-icon=\'{"icon": "fe fe-sunset "}\'>fe fe-sunset </option>
		<option value="fe fe-tablet"  data-icon=\'{"icon": "fe fe-tablet "}\'>fe fe-tablet </option>
		<option value="fe fe-tag"  data-icon=\'{"icon": "fe fe-tag "}\'>fe fe-tag </option>
		<option value="fe fe-target"  data-icon=\'{"icon": "fe fe-target "}\'>fe fe-target </option>
		<option value="fe fe-terminal"  data-icon=\'{"icon": "fe fe-terminal "}\'>fe fe-terminal </option>
		<option value="fe fe-thermometer"  data-icon=\'{"icon": "fe fe-thermometer "}\'>fe fe-thermometer </option>
		<option value="fe fe-thumbs-down"  data-icon=\'{"icon": "fe fe-thumbs-down "}\'>fe fe-thumbs-down </option>
		<option value="fe fe-thumbs-up"  data-icon=\'{"icon": "fe fe-thumbs-up "}\'>fe fe-thumbs-up </option>
		<option value="fe fe-toggle-left"  data-icon=\'{"icon": "fe fe-toggle-left "}\'>fe fe-toggle-left </option>
		<option value="fe fe-toggle-right"  data-icon=\'{"icon": "fe fe-toggle-right "}\'>fe fe-toggle-right </option>
		<option value="fe fe-trash"  data-icon=\'{"icon": "fe fe-trash "}\'>fe fe-trash </option>
		<option value="fe fe-trash-2"  data-icon=\'{"icon": "fe fe-trash-2 "}\'>fe fe-trash-2 </option>
		<option value="fe fe-trending-down"  data-icon=\'{"icon": "fe fe-trending-down "}\'>fe fe-trending-down </option>
		<option value="fe fe-trending-up"  data-icon=\'{"icon": "fe fe-trending-up "}\'>fe fe-trending-up </option>
		<option value="fe fe-triangle"  data-icon=\'{"icon": "fe fe-triangle "}\'>fe fe-triangle </option>
		<option value="fe fe-truck"  data-icon=\'{"icon": "fe fe-truck "}\'>fe fe-truck </option>
		<option value="fe fe-tv"  data-icon=\'{"icon": "fe fe-tv "}\'>fe fe-tv </option>
		<option value="fe fe-twitter"  data-icon=\'{"icon": "fe fe-twitter "}\'>fe fe-twitter </option>
		<option value="fe fe-type"  data-icon=\'{"icon": "fe fe-type "}\'>fe fe-type </option>
		<option value="fe fe-umbrella"  data-icon=\'{"icon": "fe fe-umbrella "}\'>fe fe-umbrella </option>
		<option value="fe fe-underline"  data-icon=\'{"icon": "fe fe-underline "}\'>fe fe-underline </option>
		<option value="fe fe-unlock"  data-icon=\'{"icon": "fe fe-unlock "}\'>fe fe-unlock </option>
		<option value="fe fe-upload"  data-icon=\'{"icon": "fe fe-upload "}\'>fe fe-upload </option>
		<option value="fe fe-upload-cloud"  data-icon=\'{"icon": "fe fe-upload-cloud "}\'>fe fe-upload-cloud </option>
		<option value="fe fe-user"  data-icon=\'{"icon": "fe fe-user "}\'>fe fe-user </option>
		<option value="fe fe-user-check"  data-icon=\'{"icon": "fe fe-user-check "}\'>fe fe-user-check </option>
		<option value="fe fe-user-minus"  data-icon=\'{"icon": "fe fe-user-minus "}\'>fe fe-user-minus </option>
		<option value="fe fe-user-plus"  data-icon=\'{"icon": "fe fe-user-plus "}\'>fe fe-user-plus </option>
		<option value="fe fe-user-x"  data-icon=\'{"icon": "fe fe-user-x "}\'>fe fe-user-x </option>
		<option value="fe fe-users"  data-icon=\'{"icon": "fe fe-users "}\'>fe fe-users </option>
		<option value="fe fe-video"  data-icon=\'{"icon": "fe fe-video "}\'>fe fe-video </option>
		<option value="fe fe-video-off"  data-icon=\'{"icon": "fe fe-video-off "}\'>fe fe-video-off </option>
		<option value="fe fe-voicemail"  data-icon=\'{"icon": "fe fe-voicemail "}\'>fe fe-voicemail </option>
		<option value="fe fe-volume"  data-icon=\'{"icon": "fe fe-volume "}\'>fe fe-volume </option>
		<option value="fe fe-volume-1"  data-icon=\'{"icon": "fe fe-volume-1 "}\'>fe fe-volume-1 </option>
		<option value="fe fe-volume-2"  data-icon=\'{"icon": "fe fe-volume-2 "}\'>fe fe-volume-2 </option>
		<option value="fe fe-volume-x"  data-icon=\'{"icon": "fe fe-volume-x "}\'>fe fe-volume-x </option>
		<option value="fe fe-watch"  data-icon=\'{"icon": "fe fe-watch "}\'>fe fe-watch </option>
		<option value="fe fe-wifi"  data-icon=\'{"icon": "fe fe-wifi "}\'>fe fe-wifi </option>
		<option value="fe fe-wifi-off"  data-icon=\'{"icon": "fe fe-wifi-off "}\'>fe fe-wifi-off </option>
		<option value="fe fe-wind"  data-icon=\'{"icon": "fe fe-wind "}\'>fe fe-wind </option>
		<option value="fe fe-x"  data-icon=\'{"icon": "fe fe-x "}\'>fe fe-x </option>
		<option value="fe fe-x-circle"  data-icon=\'{"icon": "fe fe-x-circle "}\'>fe fe-x-circle </option>
		<option value="fe fe-x-square"  data-icon=\'{"icon": "fe fe-x-square "}\'>fe fe-x-square </option>
		<option value="fe fe-zap"  data-icon=\'{"icon": "fe fe-zap "}\'>fe fe-zap </option>
		<option value="fe fe-zap-off"  data-icon=\'{"icon": "fe fe-zap-off "}\'>fe fe-zap-off </option>
		<option value="fe fe-zoom-in"  data-icon=\'{"icon": "fe fe-zoom-in "}\'>fe fe-zoom-in </option>
		<option value="fe fe-zoom-out"  data-icon=\'{"icon": "fe fe-zoom-out "}\'>fe fe-zoom-out </option>
		<option value="fa fa-500px"  data-icon=\'{"icon": "fa fa-500px"}\'>fa fa-500px</option>
		<option value="fa fa-address-book"  data-icon=\'{"icon": "fa fa-address-book"}\'>fa fa-address-book</option>
		<option value="fa fa-address-book-o"  data-icon=\'{"icon": "fa fa-address-book-o"}\'>fa fa-address-book-o</option>
		<option value="fa fa-address-card"  data-icon=\'{"icon": "fa fa-address-card"}\'>fa fa-address-card</option>
		<option value="fa fa-address-card-o"  data-icon=\'{"icon": "fa fa-address-card-o"}\'>fa fa-address-card-o</option>
		<option value="fa fa-adjust"  data-icon=\'{"icon": "fa fa-adjust"}\'>fa fa-adjust</option>
		<option value="fa fa-adn"  data-icon=\'{"icon": "fa fa-adn"}\'>fa fa-adn</option>
		<option value="fa fa-align-center"  data-icon=\'{"icon": "fa fa-align-center"}\'>fa fa-align-center</option>
		<option value="fa fa-align-justify"  data-icon=\'{"icon": "fa fa-align-justify"}\'>fa fa-align-justify</option>
		<option value="fa fa-align-left"  data-icon=\'{"icon": "fa fa-align-left"}\'>fa fa-align-left</option>
		<option value="fa fa-align-right"  data-icon=\'{"icon": "fa fa-align-right"}\'>fa fa-align-right</option>
		<option value="fa fa-amazon"  data-icon=\'{"icon": "fa fa-amazon"}\'>fa fa-amazon</option>
		<option value="fa fa-ambulance"  data-icon=\'{"icon": "fa fa-ambulance"}\'>fa fa-ambulance</option>
		<option value="fa fa-american-sign-language-interpreting"  data-icon=\'{"icon": "fa fa-american-sign-language-interpreting"}\'>fa fa-american-sign-language-interpreting</option>
		<option value="fa fa-anchor"  data-icon=\'{"icon": "fa fa-anchor"}\'>fa fa-anchor</option>
		<option value="fa fa-android"  data-icon=\'{"icon": "fa fa-android"}\'>fa fa-android</option>
		<option value="fa fa-angellist"  data-icon=\'{"icon": "fa fa-angellist"}\'>fa fa-angellist</option>
		<option value="fa fa-angle-double-down"  data-icon=\'{"icon": "fa fa-angle-double-down"}\'>fa fa-angle-double-down</option>
		<option value="fa fa-angle-double-left"  data-icon=\'{"icon": "fa fa-angle-double-left"}\'>fa fa-angle-double-left</option>
		<option value="fa fa-angle-double-right"  data-icon=\'{"icon": "fa fa-angle-double-right"}\'>fa fa-angle-double-right</option>
		<option value="fa fa-angle-double-up"  data-icon=\'{"icon": "fa fa-angle-double-up"}\'>fa fa-angle-double-up</option>
		<option value="fa fa-angle-down"  data-icon=\'{"icon": "fa fa-angle-down"}\'>fa fa-angle-down</option>
		<option value="fa fa-angle-left"  data-icon=\'{"icon": "fa fa-angle-left"}\'>fa fa-angle-left</option>
		<option value="fa fa-angle-right"  data-icon=\'{"icon": "fa fa-angle-right"}\'>fa fa-angle-right</option>
		<option value="fa fa-angle-up"  data-icon=\'{"icon": "fa fa-angle-up"}\'>fa fa-angle-up</option>
		<option value="fa fa-apple"  data-icon=\'{"icon": "fa fa-apple"}\'>fa fa-apple</option>
		<option value="fa fa-archive"  data-icon=\'{"icon": "fa fa-archive"}\'>fa fa-archive</option>
		<option value="fa fa-area-chart"  data-icon=\'{"icon": "fa fa-area-chart"}\'>fa fa-area-chart</option>
		<option value="fa fa-arrow-circle-down"  data-icon=\'{"icon": "fa fa-arrow-circle-down"}\'>fa fa-arrow-circle-down</option>
		<option value="fa fa-arrow-circle-left"  data-icon=\'{"icon": "fa fa-arrow-circle-left"}\'>fa fa-arrow-circle-left</option>
		<option value="fa fa-arrow-circle-o-down"  data-icon=\'{"icon": "fa fa-arrow-circle-o-down"}\'>fa fa-arrow-circle-o-down</option>
		<option value="fa fa-arrow-circle-o-left"  data-icon=\'{"icon": "fa fa-arrow-circle-o-left"}\'>fa fa-arrow-circle-o-left</option>
		<option value="fa fa-arrow-circle-o-right"  data-icon=\'{"icon": "fa fa-arrow-circle-o-right"}\'>fa fa-arrow-circle-o-right</option>
		<option value="fa fa-arrow-circle-o-up"  data-icon=\'{"icon": "fa fa-arrow-circle-o-up"}\'>fa fa-arrow-circle-o-up</option>
		<option value="fa fa-arrow-circle-right"  data-icon=\'{"icon": "fa fa-arrow-circle-right"}\'>fa fa-arrow-circle-right</option>
		<option value="fa fa-arrow-circle-up"  data-icon=\'{"icon": "fa fa-arrow-circle-up"}\'>fa fa-arrow-circle-up</option>
		<option value="fa fa-arrow-down"  data-icon=\'{"icon": "fa fa-arrow-down"}\'>fa fa-arrow-down</option>
		<option value="fa fa-arrow-left"  data-icon=\'{"icon": "fa fa-arrow-left"}\'>fa fa-arrow-left</option>
		<option value="fa fa-arrow-right"  data-icon=\'{"icon": "fa fa-arrow-right"}\'>fa fa-arrow-right</option>
		<option value="fa fa-arrow-up"  data-icon=\'{"icon": "fa fa-arrow-up"}\'>fa fa-arrow-up</option>
		<option value="fa fa-arrows"  data-icon=\'{"icon": "fa fa-arrows"}\'>fa fa-arrows</option>
		<option value="fa fa-arrows-alt"  data-icon=\'{"icon": "fa fa-arrows-alt"}\'>fa fa-arrows-alt</option>
		<option value="fa fa-arrows-h"  data-icon=\'{"icon": "fa fa-arrows-h"}\'>fa fa-arrows-h</option>
		<option value="fa fa-arrows-v"  data-icon=\'{"icon": "fa fa-arrows-v"}\'>fa fa-arrows-v</option>
		<option value="fa fa-asl-interpreting"  data-icon=\'{"icon": "fa fa-asl-interpreting"}\'>fa fa-asl-interpreting</option>
		<option value="fa fa-assistive-listening-systems"  data-icon=\'{"icon": "fa fa-assistive-listening-systems"}\'>fa fa-assistive-listening-systems</option>
		<option value="fa fa-asterisk"  data-icon=\'{"icon": "fa fa-asterisk"}\'>fa fa-asterisk</option>
		<option value="fa fa-at"  data-icon=\'{"icon": "fa fa-at"}\'>fa fa-at</option>
		<option value="fa fa-audio-description"  data-icon=\'{"icon": "fa fa-audio-description"}\'>fa fa-audio-description</option>
		<option value="fa fa-automobile"  data-icon=\'{"icon": "fa fa-automobile"}\'>fa fa-automobile</option>
		<option value="fa fa-backward"  data-icon=\'{"icon": "fa fa-backward"}\'>fa fa-backward</option>
		<option value="fa fa-balance-scale"  data-icon=\'{"icon": "fa fa-balance-scale"}\'>fa fa-balance-scale</option>
		<option value="fa fa-ban"  data-icon=\'{"icon": "fa fa-ban"}\'>fa fa-ban</option>
		<option value="fa fa-bandcamp"  data-icon=\'{"icon": "fa fa-bandcamp"}\'>fa fa-bandcamp</option>
		<option value="fa fa-bank"  data-icon=\'{"icon": "fa fa-bank"}\'>fa fa-bank</option>
		<option value="fa fa-bar-chart"  data-icon=\'{"icon": "fa fa-bar-chart"}\'>fa fa-bar-chart</option>
		<option value="fa fa-bar-chart-o"  data-icon=\'{"icon": "fa fa-bar-chart-o"}\'>fa fa-bar-chart-o</option>
		<option value="fa fa-barcode"  data-icon=\'{"icon": "fa fa-barcode"}\'>fa fa-barcode</option>
		<option value="fa fa-bars"  data-icon=\'{"icon": "fa fa-bars"}\'>fa fa-bars</option>
		<option value="fa fa-bath"  data-icon=\'{"icon": "fa fa-bath"}\'>fa fa-bath</option>
		<option value="fa fa-bathtub"  data-icon=\'{"icon": "fa fa-bathtub"}\'>fa fa-bathtub</option>
		<option value="fa fa-battery"  data-icon=\'{"icon": "fa fa-battery"}\'>fa fa-battery</option>
		<option value="fa fa-battery-0"  data-icon=\'{"icon": "fa fa-battery-0"}\'>fa fa-battery-0</option>
		<option value="fa fa-battery-1"  data-icon=\'{"icon": "fa fa-battery-1"}\'>fa fa-battery-1</option>
		<option value="fa fa-battery-2"  data-icon=\'{"icon": "fa fa-battery-2"}\'>fa fa-battery-2</option>
		<option value="fa fa-battery-3"  data-icon=\'{"icon": "fa fa-battery-3"}\'>fa fa-battery-3</option>
		<option value="fa fa-battery-4"  data-icon=\'{"icon": "fa fa-battery-4"}\'>fa fa-battery-4</option>
		<option value="fa fa-battery-empty"  data-icon=\'{"icon": "fa fa-battery-empty"}\'>fa fa-battery-empty</option>
		<option value="fa fa-battery-full"  data-icon=\'{"icon": "fa fa-battery-full"}\'>fa fa-battery-full</option>
		<option value="fa fa-battery-half"  data-icon=\'{"icon": "fa fa-battery-half"}\'>fa fa-battery-half</option>
		<option value="fa fa-battery-quarter"  data-icon=\'{"icon": "fa fa-battery-quarter"}\'>fa fa-battery-quarter</option>
		<option value="fa fa-battery-three-quarters"  data-icon=\'{"icon": "fa fa-battery-three-quarters"}\'>fa fa-battery-three-quarters</option>
		<option value="fa fa-bed"  data-icon=\'{"icon": "fa fa-bed"}\'>fa fa-bed</option>
		<option value="fa fa-beer"  data-icon=\'{"icon": "fa fa-beer"}\'>fa fa-beer</option>
		<option value="fa fa-behance"  data-icon=\'{"icon": "fa fa-behance"}\'>fa fa-behance</option>
		<option value="fa fa-behance-square"  data-icon=\'{"icon": "fa fa-behance-square"}\'>fa fa-behance-square</option>
		<option value="fa fa-bell"  data-icon=\'{"icon": "fa fa-bell"}\'>fa fa-bell</option>
		<option value="fa fa-bell-o"  data-icon=\'{"icon": "fa fa-bell-o"}\'>fa fa-bell-o</option>
		<option value="fa fa-bell-slash"  data-icon=\'{"icon": "fa fa-bell-slash"}\'>fa fa-bell-slash</option>
		<option value="fa fa-bell-slash-o"  data-icon=\'{"icon": "fa fa-bell-slash-o"}\'>fa fa-bell-slash-o</option>
		<option value="fa fa-bicycle"  data-icon=\'{"icon": "fa fa-bicycle"}\'>fa fa-bicycle</option>
		<option value="fa fa-binoculars"  data-icon=\'{"icon": "fa fa-binoculars"}\'>fa fa-binoculars</option>
		<option value="fa fa-birthday-cake"  data-icon=\'{"icon": "fa fa-birthday-cake"}\'>fa fa-birthday-cake</option>
		<option value="fa fa-bitbucket"  data-icon=\'{"icon": "fa fa-bitbucket"}\'>fa fa-bitbucket</option>
		<option value="fa fa-bitbucket-square"  data-icon=\'{"icon": "fa fa-bitbucket-square"}\'>fa fa-bitbucket-square</option>
		<option value="fa fa-bitcoin"  data-icon=\'{"icon": "fa fa-bitcoin"}\'>fa fa-bitcoin</option>
		<option value="fa fa-black-tie"  data-icon=\'{"icon": "fa fa-black-tie"}\'>fa fa-black-tie</option>
		<option value="fa fa-blind"  data-icon=\'{"icon": "fa fa-blind"}\'>fa fa-blind</option>
		<option value="fa fa-bluetooth"  data-icon=\'{"icon": "fa fa-bluetooth"}\'>fa fa-bluetooth</option>
		<option value="fa fa-bluetooth-b"  data-icon=\'{"icon": "fa fa-bluetooth-b"}\'>fa fa-bluetooth-b</option>
		<option value="fa fa-bold"  data-icon=\'{"icon": "fa fa-bold"}\'>fa fa-bold</option>
		<option value="fa fa-bolt"  data-icon=\'{"icon": "fa fa-bolt"}\'>fa fa-bolt</option>
		<option value="fa fa-bomb"  data-icon=\'{"icon": "fa fa-bomb"}\'>fa fa-bomb</option>
		<option value="fa fa-book"  data-icon=\'{"icon": "fa fa-book"}\'>fa fa-book</option>
		<option value="fa fa-bookmark"  data-icon=\'{"icon": "fa fa-bookmark"}\'>fa fa-bookmark</option>
		<option value="fa fa-bookmark-o"  data-icon=\'{"icon": "fa fa-bookmark-o"}\'>fa fa-bookmark-o</option>
		<option value="fa fa-braille"  data-icon=\'{"icon": "fa fa-braille"}\'>fa fa-braille</option>
		<option value="fa fa-briefcase"  data-icon=\'{"icon": "fa fa-briefcase"}\'>fa fa-briefcase</option>
		<option value="fa fa-btc"  data-icon=\'{"icon": "fa fa-btc"}\'>fa fa-btc</option>
		<option value="fa fa-bug"  data-icon=\'{"icon": "fa fa-bug"}\'>fa fa-bug</option>
		<option value="fa fa-building"  data-icon=\'{"icon": "fa fa-building"}\'>fa fa-building</option>
		<option value="fa fa-building-o"  data-icon=\'{"icon": "fa fa-building-o"}\'>fa fa-building-o</option>
		<option value="fa fa-bullhorn"  data-icon=\'{"icon": "fa fa-bullhorn"}\'>fa fa-bullhorn</option>
		<option value="fa fa-bullseye"  data-icon=\'{"icon": "fa fa-bullseye"}\'>fa fa-bullseye</option>
		<option value="fa fa-bus"  data-icon=\'{"icon": "fa fa-bus"}\'>fa fa-bus</option>
		<option value="fa fa-buysellads"  data-icon=\'{"icon": "fa fa-buysellads"}\'>fa fa-buysellads</option>
		<option value="fa fa-cab"  data-icon=\'{"icon": "fa fa-cab"}\'>fa fa-cab</option>
		<option value="fa fa-calculator"  data-icon=\'{"icon": "fa fa-calculator"}\'>fa fa-calculator</option>
		<option value="fa fa-calendar"  data-icon=\'{"icon": "fa fa-calendar"}\'>fa fa-calendar</option>
		<option value="fa fa-calendar-check-o"  data-icon=\'{"icon": "fa fa-calendar-check-o"}\'>fa fa-calendar-check-o</option>
		<option value="fa fa-calendar-minus-o"  data-icon=\'{"icon": "fa fa-calendar-minus-o"}\'>fa fa-calendar-minus-o</option>
		<option value="fa fa-calendar-o"  data-icon=\'{"icon": "fa fa-calendar-o"}\'>fa fa-calendar-o</option>
		<option value="fa fa-calendar-plus-o"  data-icon=\'{"icon": "fa fa-calendar-plus-o"}\'>fa fa-calendar-plus-o</option>
		<option value="fa fa-calendar-times-o"  data-icon=\'{"icon": "fa fa-calendar-times-o"}\'>fa fa-calendar-times-o</option>
		<option value="fa fa-camera"  data-icon=\'{"icon": "fa fa-camera"}\'>fa fa-camera</option>
		<option value="fa fa-camera-retro"  data-icon=\'{"icon": "fa fa-camera-retro"}\'>fa fa-camera-retro</option>
		<option value="fa fa-car"  data-icon=\'{"icon": "fa fa-car"}\'>fa fa-car</option>
		<option value="fa fa-caret-down"  data-icon=\'{"icon": "fa fa-caret-down"}\'>fa fa-caret-down</option>
		<option value="fa fa-caret-left"  data-icon=\'{"icon": "fa fa-caret-left"}\'>fa fa-caret-left</option>
		<option value="fa fa-caret-right"  data-icon=\'{"icon": "fa fa-caret-right"}\'>fa fa-caret-right</option>
		<option value="fa fa-caret-square-o-down"  data-icon=\'{"icon": "fa fa-caret-square-o-down"}\'>fa fa-caret-square-o-down</option>
		<option value="fa fa-caret-square-o-left"  data-icon=\'{"icon": "fa fa-caret-square-o-left"}\'>fa fa-caret-square-o-left</option>
		<option value="fa fa-caret-square-o-right"  data-icon=\'{"icon": "fa fa-caret-square-o-right"}\'>fa fa-caret-square-o-right</option>
		<option value="fa fa-caret-square-o-up"  data-icon=\'{"icon": "fa fa-caret-square-o-up"}\'>fa fa-caret-square-o-up</option>
		<option value="fa fa-caret-up"  data-icon=\'{"icon": "fa fa-caret-up"}\'>fa fa-caret-up</option>
		<option value="fa fa-cart-arrow-down"  data-icon=\'{"icon": "fa fa-cart-arrow-down"}\'>fa fa-cart-arrow-down</option>
		<option value="fa fa-cart-plus"  data-icon=\'{"icon": "fa fa-cart-plus"}\'>fa fa-cart-plus</option>
		<option value="fa fa-cc"  data-icon=\'{"icon": "fa fa-cc"}\'>fa fa-cc</option>
		<option value="fa fa-cc-amex"  data-icon=\'{"icon": "fa fa-cc-amex"}\'>fa fa-cc-amex</option>
		<option value="fa fa-cc-diners-club"  data-icon=\'{"icon": "fa fa-cc-diners-club"}\'>fa fa-cc-diners-club</option>
		<option value="fa fa-cc-discover"  data-icon=\'{"icon": "fa fa-cc-discover"}\'>fa fa-cc-discover</option>
		<option value="fa fa-cc-jcb"  data-icon=\'{"icon": "fa fa-cc-jcb"}\'>fa fa-cc-jcb</option>
		<option value="fa fa-cc-mastercard"  data-icon=\'{"icon": "fa fa-cc-mastercard"}\'>fa fa-cc-mastercard</option>
		<option value="fa fa-cc-paypal"  data-icon=\'{"icon": "fa fa-cc-paypal"}\'>fa fa-cc-paypal</option>
		<option value="fa fa-cc-stripe"  data-icon=\'{"icon": "fa fa-cc-stripe"}\'>fa fa-cc-stripe</option>
		<option value="fa fa-cc-visa"  data-icon=\'{"icon": "fa fa-cc-visa"}\'>fa fa-cc-visa</option>
		<option value="fa fa-certificate"  data-icon=\'{"icon": "fa fa-certificate"}\'>fa fa-certificate</option>
		<option value="fa fa-chain"  data-icon=\'{"icon": "fa fa-chain"}\'>fa fa-chain</option>
		<option value="fa fa-chain-broken"  data-icon=\'{"icon": "fa fa-chain-broken"}\'>fa fa-chain-broken</option>
		<option value="fa fa-check"  data-icon=\'{"icon": "fa fa-check"}\'>fa fa-check</option>
		<option value="fa fa-check-circle"  data-icon=\'{"icon": "fa fa-check-circle"}\'>fa fa-check-circle</option>
		<option value="fa fa-check-circle-o"  data-icon=\'{"icon": "fa fa-check-circle-o"}\'>fa fa-check-circle-o</option>
		<option value="fa fa-check-square"  data-icon=\'{"icon": "fa fa-check-square"}\'>fa fa-check-square</option>
		<option value="fa fa-check-square-o"  data-icon=\'{"icon": "fa fa-check-square-o"}\'>fa fa-check-square-o</option>
		<option value="fa fa-chevron-circle-down"  data-icon=\'{"icon": "fa fa-chevron-circle-down"}\'>fa fa-chevron-circle-down</option>
		<option value="fa fa-chevron-circle-left"  data-icon=\'{"icon": "fa fa-chevron-circle-left"}\'>fa fa-chevron-circle-left</option>
		<option value="fa fa-chevron-circle-right"  data-icon=\'{"icon": "fa fa-chevron-circle-right"}\'>fa fa-chevron-circle-right</option>
		<option value="fa fa-chevron-circle-up"  data-icon=\'{"icon": "fa fa-chevron-circle-up"}\'>fa fa-chevron-circle-up</option>
		<option value="fa fa-chevron-down"  data-icon=\'{"icon": "fa fa-chevron-down"}\'>fa fa-chevron-down</option>
		<option value="fa fa-chevron-left"  data-icon=\'{"icon": "fa fa-chevron-left"}\'>fa fa-chevron-left</option>
		<option value="fa fa-chevron-right"  data-icon=\'{"icon": "fa fa-chevron-right"}\'>fa fa-chevron-right</option>
		<option value="fa fa-chevron-up"  data-icon=\'{"icon": "fa fa-chevron-up"}\'>fa fa-chevron-up</option>
		<option value="fa fa-child"  data-icon=\'{"icon": "fa fa-child"}\'>fa fa-child</option>
		<option value="fa fa-chrome"  data-icon=\'{"icon": "fa fa-chrome"}\'>fa fa-chrome</option>
		<option value="fa fa-circle"  data-icon=\'{"icon": "fa fa-circle"}\'>fa fa-circle</option>
		<option value="fa fa-circle-o"  data-icon=\'{"icon": "fa fa-circle-o"}\'>fa fa-circle-o</option>
		<option value="fa fa-circle-o-notch"  data-icon=\'{"icon": "fa fa-circle-o-notch"}\'>fa fa-circle-o-notch</option>
		<option value="fa fa-circle-thin"  data-icon=\'{"icon": "fa fa-circle-thin"}\'>fa fa-circle-thin</option>
		<option value="fa fa-clipboard"  data-icon=\'{"icon": "fa fa-clipboard"}\'>fa fa-clipboard</option>
		<option value="fa fa-clock-o"  data-icon=\'{"icon": "fa fa-clock-o"}\'>fa fa-clock-o</option>
		<option value="fa fa-clone"  data-icon=\'{"icon": "fa fa-clone"}\'>fa fa-clone</option>
		<option value="fa fa-close"  data-icon=\'{"icon": "fa fa-close"}\'>fa fa-close</option>
		<option value="fa fa-cloud"  data-icon=\'{"icon": "fa fa-cloud"}\'>fa fa-cloud</option>
		<option value="fa fa-cloud-download"  data-icon=\'{"icon": "fa fa-cloud-download"}\'>fa fa-cloud-download</option>
		<option value="fa fa-cloud-upload"  data-icon=\'{"icon": "fa fa-cloud-upload"}\'>fa fa-cloud-upload</option>
		<option value="fa fa-cny"  data-icon=\'{"icon": "fa fa-cny"}\'>fa fa-cny</option>
		<option value="fa fa-code"  data-icon=\'{"icon": "fa fa-code"}\'>fa fa-code</option>
		<option value="fa fa-code-fork"  data-icon=\'{"icon": "fa fa-code-fork"}\'>fa fa-code-fork</option>
		<option value="fa fa-codepen"  data-icon=\'{"icon": "fa fa-codepen"}\'>fa fa-codepen</option>
		<option value="fa fa-codiepie"  data-icon=\'{"icon": "fa fa-codiepie"}\'>fa fa-codiepie</option>
		<option value="fa fa-coffee"  data-icon=\'{"icon": "fa fa-coffee"}\'>fa fa-coffee</option>
		<option value="fa fa-cog"  data-icon=\'{"icon": "fa fa-cog"}\'>fa fa-cog</option>
		<option value="fa fa-cogs"  data-icon=\'{"icon": "fa fa-cogs"}\'>fa fa-cogs</option>
		<option value="fa fa-columns"  data-icon=\'{"icon": "fa fa-columns"}\'>fa fa-columns</option>
		<option value="fa fa-comment"  data-icon=\'{"icon": "fa fa-comment"}\'>fa fa-comment</option>
		<option value="fa fa-comment-o"  data-icon=\'{"icon": "fa fa-comment-o"}\'>fa fa-comment-o</option>
		<option value="fa fa-commenting"  data-icon=\'{"icon": "fa fa-commenting"}\'>fa fa-commenting</option>
		<option value="fa fa-commenting-o"  data-icon=\'{"icon": "fa fa-commenting-o"}\'>fa fa-commenting-o</option>
		<option value="fa fa-comments"  data-icon=\'{"icon": "fa fa-comments"}\'>fa fa-comments</option>
		<option value="fa fa-comments-o"  data-icon=\'{"icon": "fa fa-comments-o"}\'>fa fa-comments-o</option>
		<option value="fa fa-compass"  data-icon=\'{"icon": "fa fa-compass"}\'>fa fa-compass</option>
		<option value="fa fa-compress"  data-icon=\'{"icon": "fa fa-compress"}\'>fa fa-compress</option>
		<option value="fa fa-connectdevelop"  data-icon=\'{"icon": "fa fa-connectdevelop"}\'>fa fa-connectdevelop</option>
		<option value="fa fa-contao"  data-icon=\'{"icon": "fa fa-contao"}\'>fa fa-contao</option>
		<option value="fa fa-copy"  data-icon=\'{"icon": "fa fa-copy"}\'>fa fa-copy</option>
		<option value="fa fa-copyright"  data-icon=\'{"icon": "fa fa-copyright"}\'>fa fa-copyright</option>
		<option value="fa fa-creative-commons"  data-icon=\'{"icon": "fa fa-creative-commons"}\'>fa fa-creative-commons</option>
		<option value="fa fa-credit-card"  data-icon=\'{"icon": "fa fa-credit-card"}\'>fa fa-credit-card</option>
		<option value="fa fa-credit-card-alt"  data-icon=\'{"icon": "fa fa-credit-card-alt"}\'>fa fa-credit-card-alt</option>
		<option value="fa fa-crop"  data-icon=\'{"icon": "fa fa-crop"}\'>fa fa-crop</option>
		<option value="fa fa-crosshairs"  data-icon=\'{"icon": "fa fa-crosshairs"}\'>fa fa-crosshairs</option>
		<option value="fa fa-css3"  data-icon=\'{"icon": "fa fa-css3"}\'>fa fa-css3</option>
		<option value="fa fa-cube"  data-icon=\'{"icon": "fa fa-cube"}\'>fa fa-cube</option>
		<option value="fa fa-cubes"  data-icon=\'{"icon": "fa fa-cubes"}\'>fa fa-cubes</option>
		<option value="fa fa-cut"  data-icon=\'{"icon": "fa fa-cut"}\'>fa fa-cut</option>
		<option value="fa fa-cutlery"  data-icon=\'{"icon": "fa fa-cutlery"}\'>fa fa-cutlery</option>
		<option value="fa fa-dashboard"  data-icon=\'{"icon": "fa fa-dashboard"}\'>fa fa-dashboard</option>
		<option value="fa fa-dashcube"  data-icon=\'{"icon": "fa fa-dashcube"}\'>fa fa-dashcube</option>
		<option value="fa fa-database"  data-icon=\'{"icon": "fa fa-database"}\'>fa fa-database</option>
		<option value="fa fa-deaf"  data-icon=\'{"icon": "fa fa-deaf"}\'>fa fa-deaf</option>
		<option value="fa fa-deafness"  data-icon=\'{"icon": "fa fa-deafness"}\'>fa fa-deafness</option>
		<option value="fa fa-dedent"  data-icon=\'{"icon": "fa fa-dedent"}\'>fa fa-dedent</option>
		<option value="fa fa-delicious"  data-icon=\'{"icon": "fa fa-delicious"}\'>fa fa-delicious</option>
		<option value="fa fa-desktop"  data-icon=\'{"icon": "fa fa-desktop"}\'>fa fa-desktop</option>
		<option value="fa fa-deviantart"  data-icon=\'{"icon": "fa fa-deviantart"}\'>fa fa-deviantart</option>
		<option value="fa fa-diamond"  data-icon=\'{"icon": "fa fa-diamond"}\'>fa fa-diamond</option>
		<option value="fa fa-digg"  data-icon=\'{"icon": "fa fa-digg"}\'>fa fa-digg</option>
		<option value="fa fa-dollar"  data-icon=\'{"icon": "fa fa-dollar"}\'>fa fa-dollar</option>
		<option value="fa fa-dot-circle-o"  data-icon=\'{"icon": "fa fa-dot-circle-o"}\'>fa fa-dot-circle-o</option>
		<option value="fa fa-download"  data-icon=\'{"icon": "fa fa-download"}\'>fa fa-download</option>
		<option value="fa fa-dribbble"  data-icon=\'{"icon": "fa fa-dribbble"}\'>fa fa-dribbble</option>
		<option value="fa fa-drivers-license"  data-icon=\'{"icon": "fa fa-drivers-license"}\'>fa fa-drivers-license</option>
		<option value="fa fa-drivers-license-o"  data-icon=\'{"icon": "fa fa-drivers-license-o"}\'>fa fa-drivers-license-o</option>
		<option value="fa fa-dropbox"  data-icon=\'{"icon": "fa fa-dropbox"}\'>fa fa-dropbox</option>
		<option value="fa fa-drupal"  data-icon=\'{"icon": "fa fa-drupal"}\'>fa fa-drupal</option>
		<option value="fa fa-edge"  data-icon=\'{"icon": "fa fa-edge"}\'>fa fa-edge</option>
		<option value="fa fa-edit"  data-icon=\'{"icon": "fa fa-edit"}\'>fa fa-edit</option>
		<option value="fa fa-eercast"  data-icon=\'{"icon": "fa fa-eercast"}\'>fa fa-eercast</option>
		<option value="fa fa-eject"  data-icon=\'{"icon": "fa fa-eject"}\'>fa fa-eject</option>
		<option value="fa fa-ellipsis-h"  data-icon=\'{"icon": "fa fa-ellipsis-h"}\'>fa fa-ellipsis-h</option>
		<option value="fa fa-ellipsis-v"  data-icon=\'{"icon": "fa fa-ellipsis-v"}\'>fa fa-ellipsis-v</option>
		<option value="fa fa-empire"  data-icon=\'{"icon": "fa fa-empire"}\'>fa fa-empire</option>
		<option value="fa fa-envelope"  data-icon=\'{"icon": "fa fa-envelope"}\'>fa fa-envelope</option>
		<option value="fa fa-envelope-o"  data-icon=\'{"icon": "fa fa-envelope-o"}\'>fa fa-envelope-o</option>
		<option value="fa fa-envelope-open"  data-icon=\'{"icon": "fa fa-envelope-open"}\'>fa fa-envelope-open</option>
		<option value="fa fa-envelope-open-o"  data-icon=\'{"icon": "fa fa-envelope-open-o"}\'>fa fa-envelope-open-o</option>
		<option value="fa fa-envelope-square"  data-icon=\'{"icon": "fa fa-envelope-square"}\'>fa fa-envelope-square</option>
		<option value="fa fa-envira"  data-icon=\'{"icon": "fa fa-envira"}\'>fa fa-envira</option>
		<option value="fa fa-eraser"  data-icon=\'{"icon": "fa fa-eraser"}\'>fa fa-eraser</option>
		<option value="fa fa-etsy"  data-icon=\'{"icon": "fa fa-etsy"}\'>fa fa-etsy</option>
		<option value="fa fa-eur"  data-icon=\'{"icon": "fa fa-eur"}\'>fa fa-eur</option>
		<option value="fa fa-euro"  data-icon=\'{"icon": "fa fa-euro"}\'>fa fa-euro</option>
		<option value="fa fa-exchange"  data-icon=\'{"icon": "fa fa-exchange"}\'>fa fa-exchange</option>
		<option value="fa fa-exclamation"  data-icon=\'{"icon": "fa fa-exclamation"}\'>fa fa-exclamation</option>
		<option value="fa fa-exclamation-circle"  data-icon=\'{"icon": "fa fa-exclamation-circle"}\'>fa fa-exclamation-circle</option>
		<option value="fa fa-exclamation-triangle"  data-icon=\'{"icon": "fa fa-exclamation-triangle"}\'>fa fa-exclamation-triangle</option>
		<option value="fa fa-expand"  data-icon=\'{"icon": "fa fa-expand"}\'>fa fa-expand</option>
		<option value="fa fa-expeditedssl"  data-icon=\'{"icon": "fa fa-expeditedssl"}\'>fa fa-expeditedssl</option>
		<option value="fa fa-external-link"  data-icon=\'{"icon": "fa fa-external-link"}\'>fa fa-external-link</option>
		<option value="fa fa-external-link-square"  data-icon=\'{"icon": "fa fa-external-link-square"}\'>fa fa-external-link-square</option>
		<option value="fa fa-eye"  data-icon=\'{"icon": "fa fa-eye"}\'>fa fa-eye</option>
		<option value="fa fa-eye-slash"  data-icon=\'{"icon": "fa fa-eye-slash"}\'>fa fa-eye-slash</option>
		<option value="fa fa-eyedropper"  data-icon=\'{"icon": "fa fa-eyedropper"}\'>fa fa-eyedropper</option>
		<option value="fa fa-fa"  data-icon=\'{"icon": "fa fa-fa"}\'>fa fa-fa</option>
		<option value="fa fa-facebook"  data-icon=\'{"icon": "fa fa-facebook"}\'>fa fa-facebook</option>
		<option value="fa fa-facebook-f"  data-icon=\'{"icon": "fa fa-facebook-f"}\'>fa fa-facebook-f</option>
		<option value="fa fa-facebook-official"  data-icon=\'{"icon": "fa fa-facebook-official"}\'>fa fa-facebook-official</option>
		<option value="fa fa-facebook-square"  data-icon=\'{"icon": "fa fa-facebook-square"}\'>fa fa-facebook-square</option>
		<option value="fa fa-fast-backward"  data-icon=\'{"icon": "fa fa-fast-backward"}\'>fa fa-fast-backward</option>
		<option value="fa fa-fast-forward"  data-icon=\'{"icon": "fa fa-fast-forward"}\'>fa fa-fast-forward</option>
		<option value="fa fa-fax"  data-icon=\'{"icon": "fa fa-fax"}\'>fa fa-fax</option>
		<option value="fa fa-feed"  data-icon=\'{"icon": "fa fa-feed"}\'>fa fa-feed</option>
		<option value="fa fa-female"  data-icon=\'{"icon": "fa fa-female"}\'>fa fa-female</option>
		<option value="fa fa-fighter-jet"  data-icon=\'{"icon": "fa fa-fighter-jet"}\'>fa fa-fighter-jet</option>
		<option value="fa fa-file"  data-icon=\'{"icon": "fa fa-file"}\'>fa fa-file</option>
		<option value="fa fa-file-archive-o"  data-icon=\'{"icon": "fa fa-file-archive-o"}\'>fa fa-file-archive-o</option>
		<option value="fa fa-file-audio-o"  data-icon=\'{"icon": "fa fa-file-audio-o"}\'>fa fa-file-audio-o</option>
		<option value="fa fa-file-code-o"  data-icon=\'{"icon": "fa fa-file-code-o"}\'>fa fa-file-code-o</option>
		<option value="fa fa-file-excel-o"  data-icon=\'{"icon": "fa fa-file-excel-o"}\'>fa fa-file-excel-o</option>
		<option value="fa fa-file-image-o"  data-icon=\'{"icon": "fa fa-file-image-o"}\'>fa fa-file-image-o</option>
		<option value="fa fa-file-movie-o"  data-icon=\'{"icon": "fa fa-file-movie-o"}\'>fa fa-file-movie-o</option>
		<option value="fa fa-file-o"  data-icon=\'{"icon": "fa fa-file-o"}\'>fa fa-file-o</option>
		<option value="fa fa-file-pdf-o"  data-icon=\'{"icon": "fa fa-file-pdf-o"}\'>fa fa-file-pdf-o</option>
		<option value="fa fa-file-photo-o"  data-icon=\'{"icon": "fa fa-file-photo-o"}\'>fa fa-file-photo-o</option>
		<option value="fa fa-file-picture-o"  data-icon=\'{"icon": "fa fa-file-picture-o"}\'>fa fa-file-picture-o</option>
		<option value="fa fa-file-powerpoint-o"  data-icon=\'{"icon": "fa fa-file-powerpoint-o"}\'>fa fa-file-powerpoint-o</option>
		<option value="fa fa-file-sound-o"  data-icon=\'{"icon": "fa fa-file-sound-o"}\'>fa fa-file-sound-o</option>
		<option value="fa fa-file-text"  data-icon=\'{"icon": "fa fa-file-text"}\'>fa fa-file-text</option>
		<option value="fa fa-file-text-o"  data-icon=\'{"icon": "fa fa-file-text-o"}\'>fa fa-file-text-o</option>
		<option value="fa fa-file-video-o"  data-icon=\'{"icon": "fa fa-file-video-o"}\'>fa fa-file-video-o</option>
		<option value="fa fa-file-word-o"  data-icon=\'{"icon": "fa fa-file-word-o"}\'>fa fa-file-word-o</option>
		<option value="fa fa-file-zip-o"  data-icon=\'{"icon": "fa fa-file-zip-o"}\'>fa fa-file-zip-o</option>
		<option value="fa fa-files-o"  data-icon=\'{"icon": "fa fa-files-o"}\'>fa fa-files-o</option>
		<option value="fa fa-film"  data-icon=\'{"icon": "fa fa-film"}\'>fa fa-film</option>
		<option value="fa fa-filter"  data-icon=\'{"icon": "fa fa-filter"}\'>fa fa-filter</option>
		<option value="fa fa-fire"  data-icon=\'{"icon": "fa fa-fire"}\'>fa fa-fire</option>
		<option value="fa fa-fire-extinguisher"  data-icon=\'{"icon": "fa fa-fire-extinguisher"}\'>fa fa-fire-extinguisher</option>
		<option value="fa fa-firefox"  data-icon=\'{"icon": "fa fa-firefox"}\'>fa fa-firefox</option>
		<option value="fa fa-first-order"  data-icon=\'{"icon": "fa fa-first-order"}\'>fa fa-first-order</option>
		<option value="fa fa-flag"  data-icon=\'{"icon": "fa fa-flag"}\'>fa fa-flag</option>
		<option value="fa fa-flag-checkered"  data-icon=\'{"icon": "fa fa-flag-checkered"}\'>fa fa-flag-checkered</option>
		<option value="fa fa-flag-o"  data-icon=\'{"icon": "fa fa-flag-o"}\'>fa fa-flag-o</option>
		<option value="fa fa-flash"  data-icon=\'{"icon": "fa fa-flash"}\'>fa fa-flash</option>
		<option value="fa fa-flask"  data-icon=\'{"icon": "fa fa-flask"}\'>fa fa-flask</option>
		<option value="fa fa-flickr"  data-icon=\'{"icon": "fa fa-flickr"}\'>fa fa-flickr</option>
		<option value="fa fa-floppy-o"  data-icon=\'{"icon": "fa fa-floppy-o"}\'>fa fa-floppy-o</option>
		<option value="fa fa-folder"  data-icon=\'{"icon": "fa fa-folder"}\'>fa fa-folder</option>
		<option value="fa fa-folder-o"  data-icon=\'{"icon": "fa fa-folder-o"}\'>fa fa-folder-o</option>
		<option value="fa fa-folder-open"  data-icon=\'{"icon": "fa fa-folder-open"}\'>fa fa-folder-open</option>
		<option value="fa fa-folder-open-o"  data-icon=\'{"icon": "fa fa-folder-open-o"}\'>fa fa-folder-open-o</option>
		<option value="fa fa-font"  data-icon=\'{"icon": "fa fa-font"}\'>fa fa-font</option>
		<option value="fa fa-font-awesome"  data-icon=\'{"icon": "fa fa-font-awesome"}\'>fa fa-font-awesome</option>
		<option value="fa fa-fonticons"  data-icon=\'{"icon": "fa fa-fonticons"}\'>fa fa-fonticons</option>
		<option value="fa fa-fort-awesome"  data-icon=\'{"icon": "fa fa-fort-awesome"}\'>fa fa-fort-awesome</option>
		<option value="fa fa-forumbee"  data-icon=\'{"icon": "fa fa-forumbee"}\'>fa fa-forumbee</option>
		<option value="fa fa-forward"  data-icon=\'{"icon": "fa fa-forward"}\'>fa fa-forward</option>
		<option value="fa fa-foursquare"  data-icon=\'{"icon": "fa fa-foursquare"}\'>fa fa-foursquare</option>
		<option value="fa fa-free-code-camp"  data-icon=\'{"icon": "fa fa-free-code-camp"}\'>fa fa-free-code-camp</option>
		<option value="fa fa-frown-o"  data-icon=\'{"icon": "fa fa-frown-o"}\'>fa fa-frown-o</option>
		<option value="fa fa-futbol-o"  data-icon=\'{"icon": "fa fa-futbol-o"}\'>fa fa-futbol-o</option>
		<option value="fa fa-gamepad"  data-icon=\'{"icon": "fa fa-gamepad"}\'>fa fa-gamepad</option>
		<option value="fa fa-gavel"  data-icon=\'{"icon": "fa fa-gavel"}\'>fa fa-gavel</option>
		<option value="fa fa-gbp"  data-icon=\'{"icon": "fa fa-gbp"}\'>fa fa-gbp</option>
		<option value="fa fa-ge"  data-icon=\'{"icon": "fa fa-ge"}\'>fa fa-ge</option>
		<option value="fa fa-gear"  data-icon=\'{"icon": "fa fa-gear"}\'>fa fa-gear</option>
		<option value="fa fa-gears"  data-icon=\'{"icon": "fa fa-gears"}\'>fa fa-gears</option>
		<option value="fa fa-genderless"  data-icon=\'{"icon": "fa fa-genderless"}\'>fa fa-genderless</option>
		<option value="fa fa-get-pocket"  data-icon=\'{"icon": "fa fa-get-pocket"}\'>fa fa-get-pocket</option>
		<option value="fa fa-gg"  data-icon=\'{"icon": "fa fa-gg"}\'>fa fa-gg</option>
		<option value="fa fa-gg-circle"  data-icon=\'{"icon": "fa fa-gg-circle"}\'>fa fa-gg-circle</option>
		<option value="fa fa-gift"  data-icon=\'{"icon": "fa fa-gift"}\'>fa fa-gift</option>
		<option value="fa fa-git"  data-icon=\'{"icon": "fa fa-git"}\'>fa fa-git</option>
		<option value="fa fa-git-square"  data-icon=\'{"icon": "fa fa-git-square"}\'>fa fa-git-square</option>
		<option value="fa fa-github"  data-icon=\'{"icon": "fa fa-github"}\'>fa fa-github</option>
		<option value="fa fa-github-alt"  data-icon=\'{"icon": "fa fa-github-alt"}\'>fa fa-github-alt</option>
		<option value="fa fa-github-square"  data-icon=\'{"icon": "fa fa-github-square"}\'>fa fa-github-square</option>
		<option value="fa fa-gitlab"  data-icon=\'{"icon": "fa fa-gitlab"}\'>fa fa-gitlab</option>
		<option value="fa fa-gittip"  data-icon=\'{"icon": "fa fa-gittip"}\'>fa fa-gittip</option>
		<option value="fa fa-glass"  data-icon=\'{"icon": "fa fa-glass"}\'>fa fa-glass</option>
		<option value="fa fa-glide"  data-icon=\'{"icon": "fa fa-glide"}\'>fa fa-glide</option>
		<option value="fa fa-glide-g"  data-icon=\'{"icon": "fa fa-glide-g"}\'>fa fa-glide-g</option>
		<option value="fa fa-globe"  data-icon=\'{"icon": "fa fa-globe"}\'>fa fa-globe</option>
		<option value="fa fa-google"  data-icon=\'{"icon": "fa fa-google"}\'>fa fa-google</option>
		<option value="fa fa-google-plus"  data-icon=\'{"icon": "fa fa-google-plus"}\'>fa fa-google-plus</option>
		<option value="fa fa-google-plus-circle"  data-icon=\'{"icon": "fa fa-google-plus-circle"}\'>fa fa-google-plus-circle</option>
		<option value="fa fa-google-plus-official"  data-icon=\'{"icon": "fa fa-google-plus-official"}\'>fa fa-google-plus-official</option>
		<option value="fa fa-google-plus-square"  data-icon=\'{"icon": "fa fa-google-plus-square"}\'>fa fa-google-plus-square</option>
		<option value="fa fa-google-wallet"  data-icon=\'{"icon": "fa fa-google-wallet"}\'>fa fa-google-wallet</option>
		<option value="fa fa-graduation-cap"  data-icon=\'{"icon": "fa fa-graduation-cap"}\'>fa fa-graduation-cap</option>
		<option value="fa fa-gratipay"  data-icon=\'{"icon": "fa fa-gratipay"}\'>fa fa-gratipay</option>
		<option value="fa fa-grav"  data-icon=\'{"icon": "fa fa-grav"}\'>fa fa-grav</option>
		<option value="fa fa-group"  data-icon=\'{"icon": "fa fa-group"}\'>fa fa-group</option>
		<option value="fa fa-h-square"  data-icon=\'{"icon": "fa fa-h-square"}\'>fa fa-h-square</option>
		<option value="fa fa-hacker-news"  data-icon=\'{"icon": "fa fa-hacker-news"}\'>fa fa-hacker-news</option>
		<option value="fa fa-hand-grab-o"  data-icon=\'{"icon": "fa fa-hand-grab-o"}\'>fa fa-hand-grab-o</option>
		<option value="fa fa-hand-lizard-o"  data-icon=\'{"icon": "fa fa-hand-lizard-o"}\'>fa fa-hand-lizard-o</option>
		<option value="fa fa-hand-o-down"  data-icon=\'{"icon": "fa fa-hand-o-down"}\'>fa fa-hand-o-down</option>
		<option value="fa fa-hand-o-left"  data-icon=\'{"icon": "fa fa-hand-o-left"}\'>fa fa-hand-o-left</option>
		<option value="fa fa-hand-o-right"  data-icon=\'{"icon": "fa fa-hand-o-right"}\'>fa fa-hand-o-right</option>
		<option value="fa fa-hand-o-up"  data-icon=\'{"icon": "fa fa-hand-o-up"}\'>fa fa-hand-o-up</option>
		<option value="fa fa-hand-paper-o"  data-icon=\'{"icon": "fa fa-hand-paper-o"}\'>fa fa-hand-paper-o</option>
		<option value="fa fa-hand-peace-o"  data-icon=\'{"icon": "fa fa-hand-peace-o"}\'>fa fa-hand-peace-o</option>
		<option value="fa fa-hand-pointer-o"  data-icon=\'{"icon": "fa fa-hand-pointer-o"}\'>fa fa-hand-pointer-o</option>
		<option value="fa fa-hand-rock-o"  data-icon=\'{"icon": "fa fa-hand-rock-o"}\'>fa fa-hand-rock-o</option>
		<option value="fa fa-hand-scissors-o"  data-icon=\'{"icon": "fa fa-hand-scissors-o"}\'>fa fa-hand-scissors-o</option>
		<option value="fa fa-hand-spock-o"  data-icon=\'{"icon": "fa fa-hand-spock-o"}\'>fa fa-hand-spock-o</option>
		<option value="fa fa-hand-stop-o"  data-icon=\'{"icon": "fa fa-hand-stop-o"}\'>fa fa-hand-stop-o</option>
		<option value="fa fa-handshake-o"  data-icon=\'{"icon": "fa fa-handshake-o"}\'>fa fa-handshake-o</option>
		<option value="fa fa-hard-of-hearing"  data-icon=\'{"icon": "fa fa-hard-of-hearing"}\'>fa fa-hard-of-hearing</option>
		<option value="fa fa-hashtag"  data-icon=\'{"icon": "fa fa-hashtag"}\'>fa fa-hashtag</option>
		<option value="fa fa-hdd-o"  data-icon=\'{"icon": "fa fa-hdd-o"}\'>fa fa-hdd-o</option>
		<option value="fa fa-header"  data-icon=\'{"icon": "fa fa-header"}\'>fa fa-header</option>
		<option value="fa fa-headphones"  data-icon=\'{"icon": "fa fa-headphones"}\'>fa fa-headphones</option>
		<option value="fa fa-heart"  data-icon=\'{"icon": "fa fa-heart"}\'>fa fa-heart</option>
		<option value="fa fa-heart-o"  data-icon=\'{"icon": "fa fa-heart-o"}\'>fa fa-heart-o</option>
		<option value="fa fa-heartbeat"  data-icon=\'{"icon": "fa fa-heartbeat"}\'>fa fa-heartbeat</option>
		<option value="fa fa-history"  data-icon=\'{"icon": "fa fa-history"}\'>fa fa-history</option>
		<option value="fa fa-home"  data-icon=\'{"icon": "fa fa-home"}\'>fa fa-home</option>
		<option value="fa fa-hospital-o"  data-icon=\'{"icon": "fa fa-hospital-o"}\'>fa fa-hospital-o</option>
		<option value="fa fa-hotel"  data-icon=\'{"icon": "fa fa-hotel"}\'>fa fa-hotel</option>
		<option value="fa fa-hourglass"  data-icon=\'{"icon": "fa fa-hourglass"}\'>fa fa-hourglass</option>
		<option value="fa fa-hourglass-1"  data-icon=\'{"icon": "fa fa-hourglass-1"}\'>fa fa-hourglass-1</option>
		<option value="fa fa-hourglass-2"  data-icon=\'{"icon": "fa fa-hourglass-2"}\'>fa fa-hourglass-2</option>
		<option value="fa fa-hourglass-3"  data-icon=\'{"icon": "fa fa-hourglass-3"}\'>fa fa-hourglass-3</option>
		<option value="fa fa-hourglass-end"  data-icon=\'{"icon": "fa fa-hourglass-end"}\'>fa fa-hourglass-end</option>
		<option value="fa fa-hourglass-half"  data-icon=\'{"icon": "fa fa-hourglass-half"}\'>fa fa-hourglass-half</option>
		<option value="fa fa-hourglass-o"  data-icon=\'{"icon": "fa fa-hourglass-o"}\'>fa fa-hourglass-o</option>
		<option value="fa fa-hourglass-start"  data-icon=\'{"icon": "fa fa-hourglass-start"}\'>fa fa-hourglass-start</option>
		<option value="fa fa-houzz"  data-icon=\'{"icon": "fa fa-houzz"}\'>fa fa-houzz</option>
		<option value="fa fa-html5"  data-icon=\'{"icon": "fa fa-html5"}\'>fa fa-html5</option>
		<option value="fa fa-i-cursor"  data-icon=\'{"icon": "fa fa-i-cursor"}\'>fa fa-i-cursor</option>
		<option value="fa fa-id-badge"  data-icon=\'{"icon": "fa fa-id-badge"}\'>fa fa-id-badge</option>
		<option value="fa fa-id-card"  data-icon=\'{"icon": "fa fa-id-card"}\'>fa fa-id-card</option>
		<option value="fa fa-id-card-o"  data-icon=\'{"icon": "fa fa-id-card-o"}\'>fa fa-id-card-o</option>
		<option value="fa fa-ils"  data-icon=\'{"icon": "fa fa-ils"}\'>fa fa-ils</option>
		<option value="fa fa-image"  data-icon=\'{"icon": "fa fa-image"}\'>fa fa-image</option>
		<option value="fa fa-imdb"  data-icon=\'{"icon": "fa fa-imdb"}\'>fa fa-imdb</option>
		<option value="fa fa-inbox"  data-icon=\'{"icon": "fa fa-inbox"}\'>fa fa-inbox</option>
		<option value="fa fa-indent"  data-icon=\'{"icon": "fa fa-indent"}\'>fa fa-indent</option>
		<option value="fa fa-industry"  data-icon=\'{"icon": "fa fa-industry"}\'>fa fa-industry</option>
		<option value="fa fa-info"  data-icon=\'{"icon": "fa fa-info"}\'>fa fa-info</option>
		<option value="fa fa-info-circle"  data-icon=\'{"icon": "fa fa-info-circle"}\'>fa fa-info-circle</option>
		<option value="fa fa-inr"  data-icon=\'{"icon": "fa fa-inr"}\'>fa fa-inr</option>
		<option value="fa fa-instagram"  data-icon=\'{"icon": "fa fa-instagram"}\'>fa fa-instagram</option>
		<option value="fa fa-institution"  data-icon=\'{"icon": "fa fa-institution"}\'>fa fa-institution</option>
		<option value="fa fa-internet-explorer"  data-icon=\'{"icon": "fa fa-internet-explorer"}\'>fa fa-internet-explorer</option>
		<option value="fa fa-intersex"  data-icon=\'{"icon": "fa fa-intersex"}\'>fa fa-intersex</option>
		<option value="fa fa-ioxhost"  data-icon=\'{"icon": "fa fa-ioxhost"}\'>fa fa-ioxhost</option>
		<option value="fa fa-italic"  data-icon=\'{"icon": "fa fa-italic"}\'>fa fa-italic</option>
		<option value="fa fa-joomla"  data-icon=\'{"icon": "fa fa-joomla"}\'>fa fa-joomla</option>
		<option value="fa fa-jpy"  data-icon=\'{"icon": "fa fa-jpy"}\'>fa fa-jpy</option>
		<option value="fa fa-jsfiddle"  data-icon=\'{"icon": "fa fa-jsfiddle"}\'>fa fa-jsfiddle</option>
		<option value="fa fa-key"  data-icon=\'{"icon": "fa fa-key"}\'>fa fa-key</option>
		<option value="fa fa-keyboard-o"  data-icon=\'{"icon": "fa fa-keyboard-o"}\'>fa fa-keyboard-o</option>
		<option value="fa fa-krw"  data-icon=\'{"icon": "fa fa-krw"}\'>fa fa-krw</option>
		<option value="fa fa-language"  data-icon=\'{"icon": "fa fa-language"}\'>fa fa-language</option>
		<option value="fa fa-laptop"  data-icon=\'{"icon": "fa fa-laptop"}\'>fa fa-laptop</option>
		<option value="fa fa-lastfm"  data-icon=\'{"icon": "fa fa-lastfm"}\'>fa fa-lastfm</option>
		<option value="fa fa-lastfm-square"  data-icon=\'{"icon": "fa fa-lastfm-square"}\'>fa fa-lastfm-square</option>
		<option value="fa fa-leaf"  data-icon=\'{"icon": "fa fa-leaf"}\'>fa fa-leaf</option>
		<option value="fa fa-leanpub"  data-icon=\'{"icon": "fa fa-leanpub"}\'>fa fa-leanpub</option>
		<option value="fa fa-legal"  data-icon=\'{"icon": "fa fa-legal"}\'>fa fa-legal</option>
		<option value="fa fa-lemon-o"  data-icon=\'{"icon": "fa fa-lemon-o"}\'>fa fa-lemon-o</option>
		<option value="fa fa-level-down"  data-icon=\'{"icon": "fa fa-level-down"}\'>fa fa-level-down</option>
		<option value="fa fa-level-up"  data-icon=\'{"icon": "fa fa-level-up"}\'>fa fa-level-up</option>
		<option value="fa fa-life-bouy"  data-icon=\'{"icon": "fa fa-life-bouy"}\'>fa fa-life-bouy</option>
		<option value="fa fa-life-buoy"  data-icon=\'{"icon": "fa fa-life-buoy"}\'>fa fa-life-buoy</option>
		<option value="fa fa-life-ring"  data-icon=\'{"icon": "fa fa-life-ring"}\'>fa fa-life-ring</option>
		<option value="fa fa-life-saver"  data-icon=\'{"icon": "fa fa-life-saver"}\'>fa fa-life-saver</option>
		<option value="fa fa-lightbulb-o"  data-icon=\'{"icon": "fa fa-lightbulb-o"}\'>fa fa-lightbulb-o</option>
		<option value="fa fa-line-chart"  data-icon=\'{"icon": "fa fa-line-chart"}\'>fa fa-line-chart</option>
		<option value="fa fa-link"  data-icon=\'{"icon": "fa fa-link"}\'>fa fa-link</option>
		<option value="fa fa-linkedin"  data-icon=\'{"icon": "fa fa-linkedin"}\'>fa fa-linkedin</option>
		<option value="fa fa-linkedin-square"  data-icon=\'{"icon": "fa fa-linkedin-square"}\'>fa fa-linkedin-square</option>
		<option value="fa fa-linode"  data-icon=\'{"icon": "fa fa-linode"}\'>fa fa-linode</option>
		<option value="fa fa-linux"  data-icon=\'{"icon": "fa fa-linux"}\'>fa fa-linux</option>
		<option value="fa fa-list"  data-icon=\'{"icon": "fa fa-list"}\'>fa fa-list</option>
		<option value="fa fa-list-alt"  data-icon=\'{"icon": "fa fa-list-alt"}\'>fa fa-list-alt</option>
		<option value="fa fa-list-ol"  data-icon=\'{"icon": "fa fa-list-ol"}\'>fa fa-list-ol</option>
		<option value="fa fa-list-ul"  data-icon=\'{"icon": "fa fa-list-ul"}\'>fa fa-list-ul</option>
		<option value="fa fa-location-arrow"  data-icon=\'{"icon": "fa fa-location-arrow"}\'>fa fa-location-arrow</option>
		<option value="fa fa-lock"  data-icon=\'{"icon": "fa fa-lock"}\'>fa fa-lock</option>
		<option value="fa fa-long-arrow-down"  data-icon=\'{"icon": "fa fa-long-arrow-down"}\'>fa fa-long-arrow-down</option>
		<option value="fa fa-long-arrow-left"  data-icon=\'{"icon": "fa fa-long-arrow-left"}\'>fa fa-long-arrow-left</option>
		<option value="fa fa-long-arrow-right"  data-icon=\'{"icon": "fa fa-long-arrow-right"}\'>fa fa-long-arrow-right</option>
		<option value="fa fa-long-arrow-up"  data-icon=\'{"icon": "fa fa-long-arrow-up"}\'>fa fa-long-arrow-up</option>
		<option value="fa fa-low-vision"  data-icon=\'{"icon": "fa fa-low-vision"}\'>fa fa-low-vision</option>
		<option value="fa fa-magic"  data-icon=\'{"icon": "fa fa-magic"}\'>fa fa-magic</option>
		<option value="fa fa-magnet"  data-icon=\'{"icon": "fa fa-magnet"}\'>fa fa-magnet</option>
		<option value="fa fa-mail-forward"  data-icon=\'{"icon": "fa fa-mail-forward"}\'>fa fa-mail-forward</option>
		<option value="fa fa-mail-reply"  data-icon=\'{"icon": "fa fa-mail-reply"}\'>fa fa-mail-reply</option>
		<option value="fa fa-mail-reply-all"  data-icon=\'{"icon": "fa fa-mail-reply-all"}\'>fa fa-mail-reply-all</option>
		<option value="fa fa-male"  data-icon=\'{"icon": "fa fa-male"}\'>fa fa-male</option>
		<option value="fa fa-map"  data-icon=\'{"icon": "fa fa-map"}\'>fa fa-map</option>
		<option value="fa fa-map-marker"  data-icon=\'{"icon": "fa fa-map-marker"}\'>fa fa-map-marker</option>
		<option value="fa fa-map-o"  data-icon=\'{"icon": "fa fa-map-o"}\'>fa fa-map-o</option>
		<option value="fa fa-map-pin"  data-icon=\'{"icon": "fa fa-map-pin"}\'>fa fa-map-pin</option>
		<option value="fa fa-map-signs"  data-icon=\'{"icon": "fa fa-map-signs"}\'>fa fa-map-signs</option>
		<option value="fa fa-mars"  data-icon=\'{"icon": "fa fa-mars"}\'>fa fa-mars</option>
		<option value="fa fa-mars-double"  data-icon=\'{"icon": "fa fa-mars-double"}\'>fa fa-mars-double</option>
		<option value="fa fa-mars-stroke"  data-icon=\'{"icon": "fa fa-mars-stroke"}\'>fa fa-mars-stroke</option>
		<option value="fa fa-mars-stroke-h"  data-icon=\'{"icon": "fa fa-mars-stroke-h"}\'>fa fa-mars-stroke-h</option>
		<option value="fa fa-mars-stroke-v"  data-icon=\'{"icon": "fa fa-mars-stroke-v"}\'>fa fa-mars-stroke-v</option>
		<option value="fa fa-maxcdn"  data-icon=\'{"icon": "fa fa-maxcdn"}\'>fa fa-maxcdn</option>
		<option value="fa fa-meanpath"  data-icon=\'{"icon": "fa fa-meanpath"}\'>fa fa-meanpath</option>
		<option value="fa fa-medium"  data-icon=\'{"icon": "fa fa-medium"}\'>fa fa-medium</option>
		<option value="fa fa-medkit"  data-icon=\'{"icon": "fa fa-medkit"}\'>fa fa-medkit</option>
		<option value="fa fa-meetup"  data-icon=\'{"icon": "fa fa-meetup"}\'>fa fa-meetup</option>
		<option value="fa fa-meh-o"  data-icon=\'{"icon": "fa fa-meh-o"}\'>fa fa-meh-o</option>
		<option value="fa fa-mercury"  data-icon=\'{"icon": "fa fa-mercury"}\'>fa fa-mercury</option>
		<option value="fa fa-microchip"  data-icon=\'{"icon": "fa fa-microchip"}\'>fa fa-microchip</option>
		<option value="fa fa-microphone"  data-icon=\'{"icon": "fa fa-microphone"}\'>fa fa-microphone</option>
		<option value="fa fa-microphone-slash"  data-icon=\'{"icon": "fa fa-microphone-slash"}\'>fa fa-microphone-slash</option>
		<option value="fa fa-minus"  data-icon=\'{"icon": "fa fa-minus"}\'>fa fa-minus</option>
		<option value="fa fa-minus-circle"  data-icon=\'{"icon": "fa fa-minus-circle"}\'>fa fa-minus-circle</option>
		<option value="fa fa-minus-square"  data-icon=\'{"icon": "fa fa-minus-square"}\'>fa fa-minus-square</option>
		<option value="fa fa-minus-square-o"  data-icon=\'{"icon": "fa fa-minus-square-o"}\'>fa fa-minus-square-o</option>
		<option value="fa fa-mixcloud"  data-icon=\'{"icon": "fa fa-mixcloud"}\'>fa fa-mixcloud</option>
		<option value="fa fa-mobile"  data-icon=\'{"icon": "fa fa-mobile"}\'>fa fa-mobile</option>
		<option value="fa fa-mobile-phone"  data-icon=\'{"icon": "fa fa-mobile-phone"}\'>fa fa-mobile-phone</option>
		<option value="fa fa-modx"  data-icon=\'{"icon": "fa fa-modx"}\'>fa fa-modx</option>
		<option value="fa fa-money"  data-icon=\'{"icon": "fa fa-money"}\'>fa fa-money</option>
		<option value="fa fa-moon-o"  data-icon=\'{"icon": "fa fa-moon-o"}\'>fa fa-moon-o</option>
		<option value="fa fa-mortar-board"  data-icon=\'{"icon": "fa fa-mortar-board"}\'>fa fa-mortar-board</option>
		<option value="fa fa-motorcycle"  data-icon=\'{"icon": "fa fa-motorcycle"}\'>fa fa-motorcycle</option>
		<option value="fa fa-mouse-pointer"  data-icon=\'{"icon": "fa fa-mouse-pointer"}\'>fa fa-mouse-pointer</option>
		<option value="fa fa-music"  data-icon=\'{"icon": "fa fa-music"}\'>fa fa-music</option>
		<option value="fa fa-navicon"  data-icon=\'{"icon": "fa fa-navicon"}\'>fa fa-navicon</option>
		<option value="fa fa-neuter"  data-icon=\'{"icon": "fa fa-neuter"}\'>fa fa-neuter</option>
		<option value="fa fa-newspaper-o"  data-icon=\'{"icon": "fa fa-newspaper-o"}\'>fa fa-newspaper-o</option>
		<option value="fa fa-object-group"  data-icon=\'{"icon": "fa fa-object-group"}\'>fa fa-object-group</option>
		<option value="fa fa-object-ungroup"  data-icon=\'{"icon": "fa fa-object-ungroup"}\'>fa fa-object-ungroup</option>
		<option value="fa fa-odnoklassniki"  data-icon=\'{"icon": "fa fa-odnoklassniki"}\'>fa fa-odnoklassniki</option>
		<option value="fa fa-odnoklassniki-square"  data-icon=\'{"icon": "fa fa-odnoklassniki-square"}\'>fa fa-odnoklassniki-square</option>
		<option value="fa fa-opencart"  data-icon=\'{"icon": "fa fa-opencart"}\'>fa fa-opencart</option>
		<option value="fa fa-openid"  data-icon=\'{"icon": "fa fa-openid"}\'>fa fa-openid</option>
		<option value="fa fa-opera"  data-icon=\'{"icon": "fa fa-opera"}\'>fa fa-opera</option>
		<option value="fa fa-optin-monster"  data-icon=\'{"icon": "fa fa-optin-monster"}\'>fa fa-optin-monster</option>
		<option value="fa fa-outdent"  data-icon=\'{"icon": "fa fa-outdent"}\'>fa fa-outdent</option>
		<option value="fa fa-pagelines"  data-icon=\'{"icon": "fa fa-pagelines"}\'>fa fa-pagelines</option>
		<option value="fa fa-paint-brush"  data-icon=\'{"icon": "fa fa-paint-brush"}\'>fa fa-paint-brush</option>
		<option value="fa fa-paper-plane"  data-icon=\'{"icon": "fa fa-paper-plane"}\'>fa fa-paper-plane</option>
		<option value="fa fa-paper-plane-o"  data-icon=\'{"icon": "fa fa-paper-plane-o"}\'>fa fa-paper-plane-o</option>
		<option value="fa fa-paperclip"  data-icon=\'{"icon": "fa fa-paperclip"}\'>fa fa-paperclip</option>
		<option value="fa fa-paragraph"  data-icon=\'{"icon": "fa fa-paragraph"}\'>fa fa-paragraph</option>
		<option value="fa fa-paste"  data-icon=\'{"icon": "fa fa-paste"}\'>fa fa-paste</option>
		<option value="fa fa-pause"  data-icon=\'{"icon": "fa fa-pause"}\'>fa fa-pause</option>
		<option value="fa fa-pause-circle"  data-icon=\'{"icon": "fa fa-pause-circle"}\'>fa fa-pause-circle</option>
		<option value="fa fa-pause-circle-o"  data-icon=\'{"icon": "fa fa-pause-circle-o"}\'>fa fa-pause-circle-o</option>
		<option value="fa fa-paw"  data-icon=\'{"icon": "fa fa-paw"}\'>fa fa-paw</option>
		<option value="fa fa-paypal"  data-icon=\'{"icon": "fa fa-paypal"}\'>fa fa-paypal</option>
		<option value="fa fa-pencil"  data-icon=\'{"icon": "fa fa-pencil"}\'>fa fa-pencil</option>
		<option value="fa fa-pencil-square"  data-icon=\'{"icon": "fa fa-pencil-square"}\'>fa fa-pencil-square</option>
		<option value="fa fa-pencil-square-o"  data-icon=\'{"icon": "fa fa-pencil-square-o"}\'>fa fa-pencil-square-o</option>
		<option value="fa fa-percent"  data-icon=\'{"icon": "fa fa-percent"}\'>fa fa-percent</option>
		<option value="fa fa-phone"  data-icon=\'{"icon": "fa fa-phone"}\'>fa fa-phone</option>
		<option value="fa fa-phone-square"  data-icon=\'{"icon": "fa fa-phone-square"}\'>fa fa-phone-square</option>
		<option value="fa fa-photo"  data-icon=\'{"icon": "fa fa-photo"}\'>fa fa-photo</option>
		<option value="fa fa-picture-o"  data-icon=\'{"icon": "fa fa-picture-o"}\'>fa fa-picture-o</option>
		<option value="fa fa-pie-chart"  data-icon=\'{"icon": "fa fa-pie-chart"}\'>fa fa-pie-chart</option>
		<option value="fa fa-pied-piper"  data-icon=\'{"icon": "fa fa-pied-piper"}\'>fa fa-pied-piper</option>
		<option value="fa fa-pied-piper-alt"  data-icon=\'{"icon": "fa fa-pied-piper-alt"}\'>fa fa-pied-piper-alt</option>
		<option value="fa fa-pied-piper-pp"  data-icon=\'{"icon": "fa fa-pied-piper-pp"}\'>fa fa-pied-piper-pp</option>
		<option value="fa fa-pinterest"  data-icon=\'{"icon": "fa fa-pinterest"}\'>fa fa-pinterest</option>
		<option value="fa fa-pinterest-p"  data-icon=\'{"icon": "fa fa-pinterest-p"}\'>fa fa-pinterest-p</option>
		<option value="fa fa-pinterest-square"  data-icon=\'{"icon": "fa fa-pinterest-square"}\'>fa fa-pinterest-square</option>
		<option value="fa fa-plane"  data-icon=\'{"icon": "fa fa-plane"}\'>fa fa-plane</option>
		<option value="fa fa-play"  data-icon=\'{"icon": "fa fa-play"}\'>fa fa-play</option>
		<option value="fa fa-play-circle"  data-icon=\'{"icon": "fa fa-play-circle"}\'>fa fa-play-circle</option>
		<option value="fa fa-play-circle-o"  data-icon=\'{"icon": "fa fa-play-circle-o"}\'>fa fa-play-circle-o</option>
		<option value="fa fa-plug"  data-icon=\'{"icon": "fa fa-plug"}\'>fa fa-plug</option>
		<option value="fa fa-plus"  data-icon=\'{"icon": "fa fa-plus"}\'>fa fa-plus</option>
		<option value="fa fa-plus-circle"  data-icon=\'{"icon": "fa fa-plus-circle"}\'>fa fa-plus-circle</option>
		<option value="fa fa-plus-square"  data-icon=\'{"icon": "fa fa-plus-square"}\'>fa fa-plus-square</option>
		<option value="fa fa-plus-square-o"  data-icon=\'{"icon": "fa fa-plus-square-o"}\'>fa fa-plus-square-o</option>
		<option value="fa fa-podcast"  data-icon=\'{"icon": "fa fa-podcast"}\'>fa fa-podcast</option>
		<option value="fa fa-power-off"  data-icon=\'{"icon": "fa fa-power-off"}\'>fa fa-power-off</option>
		<option value="fa fa-print"  data-icon=\'{"icon": "fa fa-print"}\'>fa fa-print</option>
		<option value="fa fa-product-hunt"  data-icon=\'{"icon": "fa fa-product-hunt"}\'>fa fa-product-hunt</option>
		<option value="fa fa-puzzle-piece"  data-icon=\'{"icon": "fa fa-puzzle-piece"}\'>fa fa-puzzle-piece</option>
		<option value="fa fa-qq"  data-icon=\'{"icon": "fa fa-qq"}\'>fa fa-qq</option>
		<option value="fa fa-qrcode"  data-icon=\'{"icon": "fa fa-qrcode"}\'>fa fa-qrcode</option>
		<option value="fa fa-question"  data-icon=\'{"icon": "fa fa-question"}\'>fa fa-question</option>
		<option value="fa fa-question-circle"  data-icon=\'{"icon": "fa fa-question-circle"}\'>fa fa-question-circle</option>
		<option value="fa fa-question-circle-o"  data-icon=\'{"icon": "fa fa-question-circle-o"}\'>fa fa-question-circle-o</option>
		<option value="fa fa-quora"  data-icon=\'{"icon": "fa fa-quora"}\'>fa fa-quora</option>
		<option value="fa fa-quote-left"  data-icon=\'{"icon": "fa fa-quote-left"}\'>fa fa-quote-left</option>
		<option value="fa fa-quote-right"  data-icon=\'{"icon": "fa fa-quote-right"}\'>fa fa-quote-right</option>
		<option value="fa fa-ra"  data-icon=\'{"icon": "fa fa-ra"}\'>fa fa-ra</option>
		<option value="fa fa-random"  data-icon=\'{"icon": "fa fa-random"}\'>fa fa-random</option>
		<option value="fa fa-ravelry"  data-icon=\'{"icon": "fa fa-ravelry"}\'>fa fa-ravelry</option>
		<option value="fa fa-rebel"  data-icon=\'{"icon": "fa fa-rebel"}\'>fa fa-rebel</option>
		<option value="fa fa-recycle"  data-icon=\'{"icon": "fa fa-recycle"}\'>fa fa-recycle</option>
		<option value="fa fa-reddit"  data-icon=\'{"icon": "fa fa-reddit"}\'>fa fa-reddit</option>
		<option value="fa fa-reddit-alien"  data-icon=\'{"icon": "fa fa-reddit-alien"}\'>fa fa-reddit-alien</option>
		<option value="fa fa-reddit-square"  data-icon=\'{"icon": "fa fa-reddit-square"}\'>fa fa-reddit-square</option>
		<option value="fa fa-refresh"  data-icon=\'{"icon": "fa fa-refresh"}\'>fa fa-refresh</option>
		<option value="fa fa-registered"  data-icon=\'{"icon": "fa fa-registered"}\'>fa fa-registered</option>
		<option value="fa fa-remove"  data-icon=\'{"icon": "fa fa-remove"}\'>fa fa-remove</option>
		<option value="fa fa-renren"  data-icon=\'{"icon": "fa fa-renren"}\'>fa fa-renren</option>
		<option value="fa fa-reorder"  data-icon=\'{"icon": "fa fa-reorder"}\'>fa fa-reorder</option>
		<option value="fa fa-repeat"  data-icon=\'{"icon": "fa fa-repeat"}\'>fa fa-repeat</option>
		<option value="fa fa-reply"  data-icon=\'{"icon": "fa fa-reply"}\'>fa fa-reply</option>
		<option value="fa fa-reply-all"  data-icon=\'{"icon": "fa fa-reply-all"}\'>fa fa-reply-all</option>
		<option value="fa fa-resistance"  data-icon=\'{"icon": "fa fa-resistance"}\'>fa fa-resistance</option>
		<option value="fa fa-retweet"  data-icon=\'{"icon": "fa fa-retweet"}\'>fa fa-retweet</option>
		<option value="fa fa-rmb"  data-icon=\'{"icon": "fa fa-rmb"}\'>fa fa-rmb</option>
		<option value="fa fa-road"  data-icon=\'{"icon": "fa fa-road"}\'>fa fa-road</option>
		<option value="fa fa-rocket"  data-icon=\'{"icon": "fa fa-rocket"}\'>fa fa-rocket</option>
		<option value="fa fa-rotate-left"  data-icon=\'{"icon": "fa fa-rotate-left"}\'>fa fa-rotate-left</option>
		<option value="fa fa-rotate-right"  data-icon=\'{"icon": "fa fa-rotate-right"}\'>fa fa-rotate-right</option>
		<option value="fa fa-rouble"  data-icon=\'{"icon": "fa fa-rouble"}\'>fa fa-rouble</option>
		<option value="fa fa-rss"  data-icon=\'{"icon": "fa fa-rss"}\'>fa fa-rss</option>
		<option value="fa fa-rss-square"  data-icon=\'{"icon": "fa fa-rss-square"}\'>fa fa-rss-square</option>
		<option value="fa fa-rub"  data-icon=\'{"icon": "fa fa-rub"}\'>fa fa-rub</option>
		<option value="fa fa-ruble"  data-icon=\'{"icon": "fa fa-ruble"}\'>fa fa-ruble</option>
		<option value="fa fa-rupee"  data-icon=\'{"icon": "fa fa-rupee"}\'>fa fa-rupee</option>
		<option value="fa fa-s15"  data-icon=\'{"icon": "fa fa-s15"}\'>fa fa-s15</option>
		<option value="fa fa-safari"  data-icon=\'{"icon": "fa fa-safari"}\'>fa fa-safari</option>
		<option value="fa fa-save"  data-icon=\'{"icon": "fa fa-save"}\'>fa fa-save</option>
		<option value="fa fa-scissors"  data-icon=\'{"icon": "fa fa-scissors"}\'>fa fa-scissors</option>
		<option value="fa fa-scribd"  data-icon=\'{"icon": "fa fa-scribd"}\'>fa fa-scribd</option>
		<option value="fa fa-search"  data-icon=\'{"icon": "fa fa-search"}\'>fa fa-search</option>
		<option value="fa fa-search-minus"  data-icon=\'{"icon": "fa fa-search-minus"}\'>fa fa-search-minus</option>
		<option value="fa fa-search-plus"  data-icon=\'{"icon": "fa fa-search-plus"}\'>fa fa-search-plus</option>
		<option value="fa fa-sellsy"  data-icon=\'{"icon": "fa fa-sellsy"}\'>fa fa-sellsy</option>
		<option value="fa fa-send"  data-icon=\'{"icon": "fa fa-send"}\'>fa fa-send</option>
		<option value="fa fa-send-o"  data-icon=\'{"icon": "fa fa-send-o"}\'>fa fa-send-o</option>
		<option value="fa fa-server"  data-icon=\'{"icon": "fa fa-server"}\'>fa fa-server</option>
		<option value="fa fa-share"  data-icon=\'{"icon": "fa fa-share"}\'>fa fa-share</option>
		<option value="fa fa-share-alt"  data-icon=\'{"icon": "fa fa-share-alt"}\'>fa fa-share-alt</option>
		<option value="fa fa-share-alt-square"  data-icon=\'{"icon": "fa fa-share-alt-square"}\'>fa fa-share-alt-square</option>
		<option value="fa fa-share-square"  data-icon=\'{"icon": "fa fa-share-square"}\'>fa fa-share-square</option>
		<option value="fa fa-share-square-o"  data-icon=\'{"icon": "fa fa-share-square-o"}\'>fa fa-share-square-o</option>
		<option value="fa fa-shekel"  data-icon=\'{"icon": "fa fa-shekel"}\'>fa fa-shekel</option>
		<option value="fa fa-sheqel"  data-icon=\'{"icon": "fa fa-sheqel"}\'>fa fa-sheqel</option>
		<option value="fa fa-shield"  data-icon=\'{"icon": "fa fa-shield"}\'>fa fa-shield</option>
		<option value="fa fa-ship"  data-icon=\'{"icon": "fa fa-ship"}\'>fa fa-ship</option>
		<option value="fa fa-shirtsinbulk"  data-icon=\'{"icon": "fa fa-shirtsinbulk"}\'>fa fa-shirtsinbulk</option>
		<option value="fa fa-shopping-bag"  data-icon=\'{"icon": "fa fa-shopping-bag"}\'>fa fa-shopping-bag</option>
		<option value="fa fa-shopping-basket"  data-icon=\'{"icon": "fa fa-shopping-basket"}\'>fa fa-shopping-basket</option>
		<option value="fa fa-shopping-cart"  data-icon=\'{"icon": "fa fa-shopping-cart"}\'>fa fa-shopping-cart</option>
		<option value="fa fa-shower"  data-icon=\'{"icon": "fa fa-shower"}\'>fa fa-shower</option>
		<option value="fa fa-sign-in"  data-icon=\'{"icon": "fa fa-sign-in"}\'>fa fa-sign-in</option>
		<option value="fa fa-sign-language"  data-icon=\'{"icon": "fa fa-sign-language"}\'>fa fa-sign-language</option>
		<option value="fa fa-sign-out"  data-icon=\'{"icon": "fa fa-sign-out"}\'>fa fa-sign-out</option>
		<option value="fa fa-signal"  data-icon=\'{"icon": "fa fa-signal"}\'>fa fa-signal</option>
		<option value="fa fa-signing"  data-icon=\'{"icon": "fa fa-signing"}\'>fa fa-signing</option>
		<option value="fa fa-simplybuilt"  data-icon=\'{"icon": "fa fa-simplybuilt"}\'>fa fa-simplybuilt</option>
		<option value="fa fa-sitemap"  data-icon=\'{"icon": "fa fa-sitemap"}\'>fa fa-sitemap</option>
		<option value="fa fa-skyatlas"  data-icon=\'{"icon": "fa fa-skyatlas"}\'>fa fa-skyatlas</option>
		<option value="fa fa-skype"  data-icon=\'{"icon": "fa fa-skype"}\'>fa fa-skype</option>
		<option value="fa fa-slack"  data-icon=\'{"icon": "fa fa-slack"}\'>fa fa-slack</option>
		<option value="fa fa-sliders"  data-icon=\'{"icon": "fa fa-sliders"}\'>fa fa-sliders</option>
		<option value="fa fa-slideshare"  data-icon=\'{"icon": "fa fa-slideshare"}\'>fa fa-slideshare</option>
		<option value="fa fa-smile-o"  data-icon=\'{"icon": "fa fa-smile-o"}\'>fa fa-smile-o</option>
		<option value="fa fa-snapchat"  data-icon=\'{"icon": "fa fa-snapchat"}\'>fa fa-snapchat</option>
		<option value="fa fa-snapchat-ghost"  data-icon=\'{"icon": "fa fa-snapchat-ghost"}\'>fa fa-snapchat-ghost</option>
		<option value="fa fa-snapchat-square"  data-icon=\'{"icon": "fa fa-snapchat-square"}\'>fa fa-snapchat-square</option>
		<option value="fa fa-snowflake-o"  data-icon=\'{"icon": "fa fa-snowflake-o"}\'>fa fa-snowflake-o</option>
		<option value="fa fa-soccer-ball-o"  data-icon=\'{"icon": "fa fa-soccer-ball-o"}\'>fa fa-soccer-ball-o</option>
		<option value="fa fa-sort"  data-icon=\'{"icon": "fa fa-sort"}\'>fa fa-sort</option>
		<option value="fa fa-sort-alpha-asc"  data-icon=\'{"icon": "fa fa-sort-alpha-asc"}\'>fa fa-sort-alpha-asc</option>
		<option value="fa fa-sort-alpha-desc"  data-icon=\'{"icon": "fa fa-sort-alpha-desc"}\'>fa fa-sort-alpha-desc</option>
		<option value="fa fa-sort-amount-asc"  data-icon=\'{"icon": "fa fa-sort-amount-asc"}\'>fa fa-sort-amount-asc</option>
		<option value="fa fa-sort-amount-desc"  data-icon=\'{"icon": "fa fa-sort-amount-desc"}\'>fa fa-sort-amount-desc</option>
		<option value="fa fa-sort-asc"  data-icon=\'{"icon": "fa fa-sort-asc"}\'>fa fa-sort-asc</option>
		<option value="fa fa-sort-desc"  data-icon=\'{"icon": "fa fa-sort-desc"}\'>fa fa-sort-desc</option>
		<option value="fa fa-sort-down"  data-icon=\'{"icon": "fa fa-sort-down"}\'>fa fa-sort-down</option>
		<option value="fa fa-sort-numeric-asc"  data-icon=\'{"icon": "fa fa-sort-numeric-asc"}\'>fa fa-sort-numeric-asc</option>
		<option value="fa fa-sort-numeric-desc"  data-icon=\'{"icon": "fa fa-sort-numeric-desc"}\'>fa fa-sort-numeric-desc</option>
		<option value="fa fa-sort-up"  data-icon=\'{"icon": "fa fa-sort-up"}\'>fa fa-sort-up</option>
		<option value="fa fa-soundcloud"  data-icon=\'{"icon": "fa fa-soundcloud"}\'>fa fa-soundcloud</option>
		<option value="fa fa-space-shuttle"  data-icon=\'{"icon": "fa fa-space-shuttle"}\'>fa fa-space-shuttle</option>
		<option value="fa fa-spinner"  data-icon=\'{"icon": "fa fa-spinner"}\'>fa fa-spinner</option>
		<option value="fa fa-spoon"  data-icon=\'{"icon": "fa fa-spoon"}\'>fa fa-spoon</option>
		<option value="fa fa-spotify"  data-icon=\'{"icon": "fa fa-spotify"}\'>fa fa-spotify</option>
		<option value="fa fa-square"  data-icon=\'{"icon": "fa fa-square"}\'>fa fa-square</option>
		<option value="fa fa-square-o"  data-icon=\'{"icon": "fa fa-square-o"}\'>fa fa-square-o</option>
		<option value="fa fa-stack-exchange"  data-icon=\'{"icon": "fa fa-stack-exchange"}\'>fa fa-stack-exchange</option>
		<option value="fa fa-stack-overflow"  data-icon=\'{"icon": "fa fa-stack-overflow"}\'>fa fa-stack-overflow</option>
		<option value="fa fa-star"  data-icon=\'{"icon": "fa fa-star"}\'>fa fa-star</option>
		<option value="fa fa-star-half"  data-icon=\'{"icon": "fa fa-star-half"}\'>fa fa-star-half</option>
		<option value="fa fa-star-half-empty"  data-icon=\'{"icon": "fa fa-star-half-empty"}\'>fa fa-star-half-empty</option>
		<option value="fa fa-star-half-full"  data-icon=\'{"icon": "fa fa-star-half-full"}\'>fa fa-star-half-full</option>
		<option value="fa fa-star-half-o"  data-icon=\'{"icon": "fa fa-star-half-o"}\'>fa fa-star-half-o</option>
		<option value="fa fa-star-o"  data-icon=\'{"icon": "fa fa-star-o"}\'>fa fa-star-o</option>
		<option value="fa fa-steam"  data-icon=\'{"icon": "fa fa-steam"}\'>fa fa-steam</option>
		<option value="fa fa-steam-square"  data-icon=\'{"icon": "fa fa-steam-square"}\'>fa fa-steam-square</option>
		<option value="fa fa-step-backward"  data-icon=\'{"icon": "fa fa-step-backward"}\'>fa fa-step-backward</option>
		<option value="fa fa-step-forward"  data-icon=\'{"icon": "fa fa-step-forward"}\'>fa fa-step-forward</option>
		<option value="fa fa-stethoscope"  data-icon=\'{"icon": "fa fa-stethoscope"}\'>fa fa-stethoscope</option>
		<option value="fa fa-sticky-note"  data-icon=\'{"icon": "fa fa-sticky-note"}\'>fa fa-sticky-note</option>
		<option value="fa fa-sticky-note-o"  data-icon=\'{"icon": "fa fa-sticky-note-o"}\'>fa fa-sticky-note-o</option>
		<option value="fa fa-stop"  data-icon=\'{"icon": "fa fa-stop"}\'>fa fa-stop</option>
		<option value="fa fa-stop-circle"  data-icon=\'{"icon": "fa fa-stop-circle"}\'>fa fa-stop-circle</option>
		<option value="fa fa-stop-circle-o"  data-icon=\'{"icon": "fa fa-stop-circle-o"}\'>fa fa-stop-circle-o</option>
		<option value="fa fa-street-view"  data-icon=\'{"icon": "fa fa-street-view"}\'>fa fa-street-view</option>
		<option value="fa fa-strikethrough"  data-icon=\'{"icon": "fa fa-strikethrough"}\'>fa fa-strikethrough</option>
		<option value="fa fa-stumbleupon"  data-icon=\'{"icon": "fa fa-stumbleupon"}\'>fa fa-stumbleupon</option>
		<option value="fa fa-stumbleupon-circle"  data-icon=\'{"icon": "fa fa-stumbleupon-circle"}\'>fa fa-stumbleupon-circle</option>
		<option value="fa fa-subscript"  data-icon=\'{"icon": "fa fa-subscript"}\'>fa fa-subscript</option>
		<option value="fa fa-subway"  data-icon=\'{"icon": "fa fa-subway"}\'>fa fa-subway</option>
		<option value="fa fa-suitcase"  data-icon=\'{"icon": "fa fa-suitcase"}\'>fa fa-suitcase</option>
		<option value="fa fa-sun-o"  data-icon=\'{"icon": "fa fa-sun-o"}\'>fa fa-sun-o</option>
		<option value="fa fa-superpowers"  data-icon=\'{"icon": "fa fa-superpowers"}\'>fa fa-superpowers</option>
		<option value="fa fa-superscript"  data-icon=\'{"icon": "fa fa-superscript"}\'>fa fa-superscript</option>
		<option value="fa fa-support"  data-icon=\'{"icon": "fa fa-support"}\'>fa fa-support</option>
		<option value="fa fa-table"  data-icon=\'{"icon": "fa fa-table"}\'>fa fa-table</option>
		<option value="fa fa-tablet"  data-icon=\'{"icon": "fa fa-tablet"}\'>fa fa-tablet</option>
		<option value="fa fa-tachometer"  data-icon=\'{"icon": "fa fa-tachometer"}\'>fa fa-tachometer</option>
		<option value="fa fa-tag"  data-icon=\'{"icon": "fa fa-tag"}\'>fa fa-tag</option>
		<option value="fa fa-tags"  data-icon=\'{"icon": "fa fa-tags"}\'>fa fa-tags</option>
		<option value="fa fa-tasks"  data-icon=\'{"icon": "fa fa-tasks"}\'>fa fa-tasks</option>
		<option value="fa fa-taxi"  data-icon=\'{"icon": "fa fa-taxi"}\'>fa fa-taxi</option>
		<option value="fa fa-telegram"  data-icon=\'{"icon": "fa fa-telegram"}\'>fa fa-telegram</option>
		<option value="fa fa-television"  data-icon=\'{"icon": "fa fa-television"}\'>fa fa-television</option>
		<option value="fa fa-tencent-weibo"  data-icon=\'{"icon": "fa fa-tencent-weibo"}\'>fa fa-tencent-weibo</option>
		<option value="fa fa-terminal"  data-icon=\'{"icon": "fa fa-terminal"}\'>fa fa-terminal</option>
		<option value="fa fa-text-height"  data-icon=\'{"icon": "fa fa-text-height"}\'>fa fa-text-height</option>
		<option value="fa fa-text-width"  data-icon=\'{"icon": "fa fa-text-width"}\'>fa fa-text-width</option>
		<option value="fa fa-th"  data-icon=\'{"icon": "fa fa-th"}\'>fa fa-th</option>
		<option value="fa fa-th-large"  data-icon=\'{"icon": "fa fa-th-large"}\'>fa fa-th-large</option>
		<option value="fa fa-th-list"  data-icon=\'{"icon": "fa fa-th-list"}\'>fa fa-th-list</option>
		<option value="fa fa-themeisle"  data-icon=\'{"icon": "fa fa-themeisle"}\'>fa fa-themeisle</option>
		<option value="fa fa-thermometer"  data-icon=\'{"icon": "fa fa-thermometer"}\'>fa fa-thermometer</option>
		<option value="fa fa-thermometer-0"  data-icon=\'{"icon": "fa fa-thermometer-0"}\'>fa fa-thermometer-0</option>
		<option value="fa fa-thermometer-1"  data-icon=\'{"icon": "fa fa-thermometer-1"}\'>fa fa-thermometer-1</option>
		<option value="fa fa-thermometer-2"  data-icon=\'{"icon": "fa fa-thermometer-2"}\'>fa fa-thermometer-2</option>
		<option value="fa fa-thermometer-3"  data-icon=\'{"icon": "fa fa-thermometer-3"}\'>fa fa-thermometer-3</option>
		<option value="fa fa-thermometer-4"  data-icon=\'{"icon": "fa fa-thermometer-4"}\'>fa fa-thermometer-4</option>
		<option value="fa fa-thermometer-empty"  data-icon=\'{"icon": "fa fa-thermometer-empty"}\'>fa fa-thermometer-empty</option>
		<option value="fa fa-thermometer-full"  data-icon=\'{"icon": "fa fa-thermometer-full"}\'>fa fa-thermometer-full</option>
		<option value="fa fa-thermometer-half"  data-icon=\'{"icon": "fa fa-thermometer-half"}\'>fa fa-thermometer-half</option>
		<option value="fa fa-thermometer-quarter"  data-icon=\'{"icon": "fa fa-thermometer-quarter"}\'>fa fa-thermometer-quarter</option>
		<option value="fa fa-thermometer-three-quarters"  data-icon=\'{"icon": "fa fa-thermometer-three-quarters"}\'>fa fa-thermometer-three-quarters</option>
		<option value="fa fa-thumb-tack"  data-icon=\'{"icon": "fa fa-thumb-tack"}\'>fa fa-thumb-tack</option>
		<option value="fa fa-thumbs-down"  data-icon=\'{"icon": "fa fa-thumbs-down"}\'>fa fa-thumbs-down</option>
		<option value="fa fa-thumbs-o-down"  data-icon=\'{"icon": "fa fa-thumbs-o-down"}\'>fa fa-thumbs-o-down</option>
		<option value="fa fa-thumbs-o-up"  data-icon=\'{"icon": "fa fa-thumbs-o-up"}\'>fa fa-thumbs-o-up</option>
		<option value="fa fa-thumbs-up"  data-icon=\'{"icon": "fa fa-thumbs-up"}\'>fa fa-thumbs-up</option>
		<option value="fa fa-ticket"  data-icon=\'{"icon": "fa fa-ticket"}\'>fa fa-ticket</option>
		<option value="fa fa-times"  data-icon=\'{"icon": "fa fa-times"}\'>fa fa-times</option>
		<option value="fa fa-times-circle"  data-icon=\'{"icon": "fa fa-times-circle"}\'>fa fa-times-circle</option>
		<option value="fa fa-times-circle-o"  data-icon=\'{"icon": "fa fa-times-circle-o"}\'>fa fa-times-circle-o</option>
		<option value="fa fa-times-rectangle"  data-icon=\'{"icon": "fa fa-times-rectangle"}\'>fa fa-times-rectangle</option>
		<option value="fa fa-times-rectangle-o"  data-icon=\'{"icon": "fa fa-times-rectangle-o"}\'>fa fa-times-rectangle-o</option>
		<option value="fa fa-tint"  data-icon=\'{"icon": "fa fa-tint"}\'>fa fa-tint</option>
		<option value="fa fa-toggle-down"  data-icon=\'{"icon": "fa fa-toggle-down"}\'>fa fa-toggle-down</option>
		<option value="fa fa-toggle-left"  data-icon=\'{"icon": "fa fa-toggle-left"}\'>fa fa-toggle-left</option>
		<option value="fa fa-toggle-off"  data-icon=\'{"icon": "fa fa-toggle-off"}\'>fa fa-toggle-off</option>
		<option value="fa fa-toggle-on"  data-icon=\'{"icon": "fa fa-toggle-on"}\'>fa fa-toggle-on</option>
		<option value="fa fa-toggle-right"  data-icon=\'{"icon": "fa fa-toggle-right"}\'>fa fa-toggle-right</option>
		<option value="fa fa-toggle-up"  data-icon=\'{"icon": "fa fa-toggle-up"}\'>fa fa-toggle-up</option>
		<option value="fa fa-trademark"  data-icon=\'{"icon": "fa fa-trademark"}\'>fa fa-trademark</option>
		<option value="fa fa-train"  data-icon=\'{"icon": "fa fa-train"}\'>fa fa-train</option>
		<option value="fa fa-transgender"  data-icon=\'{"icon": "fa fa-transgender"}\'>fa fa-transgender</option>
		<option value="fa fa-transgender-alt"  data-icon=\'{"icon": "fa fa-transgender-alt"}\'>fa fa-transgender-alt</option>
		<option value="fa fa-trash"  data-icon=\'{"icon": "fa fa-trash"}\'>fa fa-trash</option>
		<option value="fa fa-trash-o"  data-icon=\'{"icon": "fa fa-trash-o"}\'>fa fa-trash-o</option>
		<option value="fa fa-tree"  data-icon=\'{"icon": "fa fa-tree"}\'>fa fa-tree</option>
		<option value="fa fa-trello"  data-icon=\'{"icon": "fa fa-trello"}\'>fa fa-trello</option>
		<option value="fa fa-tripadvisor"  data-icon=\'{"icon": "fa fa-tripadvisor"}\'>fa fa-tripadvisor</option>
		<option value="fa fa-trophy"  data-icon=\'{"icon": "fa fa-trophy"}\'>fa fa-trophy</option>
		<option value="fa fa-truck"  data-icon=\'{"icon": "fa fa-truck"}\'>fa fa-truck</option>
		<option value="fa fa-try"  data-icon=\'{"icon": "fa fa-try"}\'>fa fa-try</option>
		<option value="fa fa-tty"  data-icon=\'{"icon": "fa fa-tty"}\'>fa fa-tty</option>
		<option value="fa fa-tumblr"  data-icon=\'{"icon": "fa fa-tumblr"}\'>fa fa-tumblr</option>
		<option value="fa fa-tumblr-square"  data-icon=\'{"icon": "fa fa-tumblr-square"}\'>fa fa-tumblr-square</option>
		<option value="fa fa-turkish-lira"  data-icon=\'{"icon": "fa fa-turkish-lira"}\'>fa fa-turkish-lira</option>
		<option value="fa fa-tv"  data-icon=\'{"icon": "fa fa-tv"}\'>fa fa-tv</option>
		<option value="fa fa-twitch"  data-icon=\'{"icon": "fa fa-twitch"}\'>fa fa-twitch</option>
		<option value="fa fa-twitter"  data-icon=\'{"icon": "fa fa-twitter"}\'>fa fa-twitter</option>
		<option value="fa fa-twitter-square"  data-icon=\'{"icon": "fa fa-twitter-square"}\'>fa fa-twitter-square</option>
		<option value="fa fa-umbrella"  data-icon=\'{"icon": "fa fa-umbrella"}\'>fa fa-umbrella</option>
		<option value="fa fa-underline"  data-icon=\'{"icon": "fa fa-underline"}\'>fa fa-underline</option>
		<option value="fa fa-undo"  data-icon=\'{"icon": "fa fa-undo"}\'>fa fa-undo</option>
		<option value="fa fa-universal-access"  data-icon=\'{"icon": "fa fa-universal-access"}\'>fa fa-universal-access</option>
		<option value="fa fa-university"  data-icon=\'{"icon": "fa fa-university"}\'>fa fa-university</option>
		<option value="fa fa-unlink"  data-icon=\'{"icon": "fa fa-unlink"}\'>fa fa-unlink</option>
		<option value="fa fa-unlock"  data-icon=\'{"icon": "fa fa-unlock"}\'>fa fa-unlock</option>
		<option value="fa fa-unlock-alt"  data-icon=\'{"icon": "fa fa-unlock-alt"}\'>fa fa-unlock-alt</option>
		<option value="fa fa-unsorted"  data-icon=\'{"icon": "fa fa-unsorted"}\'>fa fa-unsorted</option>
		<option value="fa fa-upload"  data-icon=\'{"icon": "fa fa-upload"}\'>fa fa-upload</option>
		<option value="fa fa-usb"  data-icon=\'{"icon": "fa fa-usb"}\'>fa fa-usb</option>
		<option value="fa fa-usd"  data-icon=\'{"icon": "fa fa-usd"}\'>fa fa-usd</option>
		<option value="fa fa-user"  data-icon=\'{"icon": "fa fa-user"}\'>fa fa-user</option>
		<option value="fa fa-user-circle"  data-icon=\'{"icon": "fa fa-user-circle"}\'>fa fa-user-circle</option>
		<option value="fa fa-user-circle-o"  data-icon=\'{"icon": "fa fa-user-circle-o"}\'>fa fa-user-circle-o</option>
		<option value="fa fa-user-md"  data-icon=\'{"icon": "fa fa-user-md"}\'>fa fa-user-md</option>
		<option value="fa fa-user-o"  data-icon=\'{"icon": "fa fa-user-o"}\'>fa fa-user-o</option>
		<option value="fa fa-user-plus"  data-icon=\'{"icon": "fa fa-user-plus"}\'>fa fa-user-plus</option>
		<option value="fa fa-user-secret"  data-icon=\'{"icon": "fa fa-user-secret"}\'>fa fa-user-secret</option>
		<option value="fa fa-user-times"  data-icon=\'{"icon": "fa fa-user-times"}\'>fa fa-user-times</option>
		<option value="fa fa-users"  data-icon=\'{"icon": "fa fa-users"}\'>fa fa-users</option>
		<option value="fa fa-vcard"  data-icon=\'{"icon": "fa fa-vcard"}\'>fa fa-vcard</option>
		<option value="fa fa-vcard-o"  data-icon=\'{"icon": "fa fa-vcard-o"}\'>fa fa-vcard-o</option>
		<option value="fa fa-venus"  data-icon=\'{"icon": "fa fa-venus"}\'>fa fa-venus</option>
		<option value="fa fa-venus-double"  data-icon=\'{"icon": "fa fa-venus-double"}\'>fa fa-venus-double</option>
		<option value="fa fa-venus-mars"  data-icon=\'{"icon": "fa fa-venus-mars"}\'>fa fa-venus-mars</option>
		<option value="fa fa-viacoin"  data-icon=\'{"icon": "fa fa-viacoin"}\'>fa fa-viacoin</option>
		<option value="fa fa-viadeo"  data-icon=\'{"icon": "fa fa-viadeo"}\'>fa fa-viadeo</option>
		<option value="fa fa-viadeo-square"  data-icon=\'{"icon": "fa fa-viadeo-square"}\'>fa fa-viadeo-square</option>
		<option value="fa fa-video-camera"  data-icon=\'{"icon": "fa fa-video-camera"}\'>fa fa-video-camera</option>
		<option value="fa fa-vimeo"  data-icon=\'{"icon": "fa fa-vimeo"}\'>fa fa-vimeo</option>
		<option value="fa fa-vimeo-square"  data-icon=\'{"icon": "fa fa-vimeo-square"}\'>fa fa-vimeo-square</option>
		<option value="fa fa-vine"  data-icon=\'{"icon": "fa fa-vine"}\'>fa fa-vine</option>
		<option value="fa fa-vk"  data-icon=\'{"icon": "fa fa-vk"}\'>fa fa-vk</option>
		<option value="fa fa-volume-control-phone"  data-icon=\'{"icon": "fa fa-volume-control-phone"}\'>fa fa-volume-control-phone</option>
		<option value="fa fa-volume-down"  data-icon=\'{"icon": "fa fa-volume-down"}\'>fa fa-volume-down</option>
		<option value="fa fa-volume-off"  data-icon=\'{"icon": "fa fa-volume-off"}\'>fa fa-volume-off</option>
		<option value="fa fa-volume-up"  data-icon=\'{"icon": "fa fa-volume-up"}\'>fa fa-volume-up</option>
		<option value="fa fa-warning"  data-icon=\'{"icon": "fa fa-warning"}\'>fa fa-warning</option>
		<option value="fa fa-wechat"  data-icon=\'{"icon": "fa fa-wechat"}\'>fa fa-wechat</option>
		<option value="fa fa-weibo"  data-icon=\'{"icon": "fa fa-weibo"}\'>fa fa-weibo</option>
		<option value="fa fa-weixin"  data-icon=\'{"icon": "fa fa-weixin"}\'>fa fa-weixin</option>
		<option value="fa fa-whatsapp"  data-icon=\'{"icon": "fa fa-whatsapp"}\'>fa fa-whatsapp</option>
		<option value="fa fa-wheelchair"  data-icon=\'{"icon": "fa fa-wheelchair"}\'>fa fa-wheelchair</option>
		<option value="fa fa-wheelchair-alt"  data-icon=\'{"icon": "fa fa-wheelchair-alt"}\'>fa fa-wheelchair-alt</option>
		<option value="fa fa-wifi"  data-icon=\'{"icon": "fa fa-wifi"}\'>fa fa-wifi</option>
		<option value="fa fa-wikipedia-w"  data-icon=\'{"icon": "fa fa-wikipedia-w"}\'>fa fa-wikipedia-w</option>
		<option value="fa fa-window-close"  data-icon=\'{"icon": "fa fa-window-close"}\'>fa fa-window-close</option>
		<option value="fa fa-window-close-o"  data-icon=\'{"icon": "fa fa-window-close-o"}\'>fa fa-window-close-o</option>
		<option value="fa fa-window-maximize"  data-icon=\'{"icon": "fa fa-window-maximize"}\'>fa fa-window-maximize</option>
		<option value="fa fa-window-minimize"  data-icon=\'{"icon": "fa fa-window-minimize"}\'>fa fa-window-minimize</option>
		<option value="fa fa-window-restore"  data-icon=\'{"icon": "fa fa-window-restore"}\'>fa fa-window-restore</option>
		<option value="fa fa-windows"  data-icon=\'{"icon": "fa fa-windows"}\'>fa fa-windows</option>
		<option value="fa fa-won"  data-icon=\'{"icon": "fa fa-won"}\'>fa fa-won</option>
		<option value="fa fa-wordpress"  data-icon=\'{"icon": "fa fa-wordpress"}\'>fa fa-wordpress</option>
		<option value="fa fa-wpbeginner"  data-icon=\'{"icon": "fa fa-wpbeginner"}\'>fa fa-wpbeginner</option>
		<option value="fa fa-wpexplorer"  data-icon=\'{"icon": "fa fa-wpexplorer"}\'>fa fa-wpexplorer</option>
		<option value="fa fa-wpforms"  data-icon=\'{"icon": "fa fa-wpforms"}\'>fa fa-wpforms</option>
		<option value="fa fa-wrench"  data-icon=\'{"icon": "fa fa-wrench"}\'>fa fa-wrench</option>
		<option value="fa fa-xing"  data-icon=\'{"icon": "fa fa-xing"}\'>fa fa-xing</option>
		<option value="fa fa-xing-square"  data-icon=\'{"icon": "fa fa-xing-square"}\'>fa fa-xing-square</option>
		<option value="fa fa-y-combinator"  data-icon=\'{"icon": "fa fa-y-combinator"}\'>fa fa-y-combinator</option>
		<option value="fa fa-y-combinator-square"  data-icon=\'{"icon": "fa fa-y-combinator-square"}\'>fa fa-y-combinator-square</option>
		<option value="fa fa-yahoo"  data-icon=\'{"icon": "fa fa-yahoo"}\'>fa fa-yahoo</option>
		<option value="fa fa-yc"  data-icon=\'{"icon": "fa fa-yc"}\'>fa fa-yc</option>
		<option value="fa fa-yc-square"  data-icon=\'{"icon": "fa fa-yc-square"}\'>fa fa-yc-square</option>
		<option value="fa fa-yelp"  data-icon=\'{"icon": "fa fa-yelp"}\'>fa fa-yelp</option>
		<option value="fa fa-yen"  data-icon=\'{"icon": "fa fa-yen"}\'>fa fa-yen</option>
		<option value="fa fa-yoast"  data-icon=\'{"icon": "fa fa-yoast"}\'>fa fa-yoast</option>
		<option value="fa fa-youtube"  data-icon=\'{"icon": "fa fa-youtube"}\'>fa fa-youtube</option>
		<option value="fa fa-youtube-play"  data-icon=\'{"icon": "fa fa-youtube-play"}\'>fa fa-youtube-play</option>
		<option value="fa fa-youtube-square"  data-icon=\'{"icon": "fa fa-youtube-square"}\'>fa fa-youtube-square</option>
		<option value="fa fa-youtube-square"  data-icon=\'{"icon": "fa fa-youtube-square"}\'>fa fa-youtube-square</option>
	 </select>';
	return $a;
}




function create_cmb_database_mto($data){
	$ci = get_instance();
	
	$id 	= @$data['id'];
	if($id=="" || $id==null)
		$id = $data['elementId'];
	
	$name 	= @$data['name'];
	if($name=="" || $name==null)
		$name = $data['elementName'];
	
	
	$class 	= @$data['class']; 
	if($class=="" || $class==null)
		$class = $data['elementClass'];
	
	$attr 	= @$data['elementAtrribute']; 

	
	$pk 	= $data['primary_key'];
	$table 	= $data['table']; 
	$selected = $data['selected'];
	$field_show = $data['field_show'];
	
	
	$afield = array();
	$afield[] = $table . "." . $pk . " as " . $pk ;
	$afield[] = $table . "." .  $field_show . " as " .  $field_show ;
	
	foreach($data['field_link'] as $key => $val){
		$afield[] = $table  . "." .  $key . " as " . $table  . "_" .  $key;
		$afield[] = $val['table']  . "." .  $val['field_show'] . " as " . $val['table']  . "_" .  $val['field_show'];
	}
	
	$ci->db->select($afield);
	
	foreach($data['field_link'] as $key => $val){
		$t1 = $table.'.'.$key;
		$t2 = $val['table'].'.id';
		$ci->db->join($val['table'],$t2.'='.$t1,'left');
	}
	
	
	
	$cmb = "<select  id='$id' name='$name' class='form-control $class' style='width: 100%;' $attr >";
	
	//NEW CODE 05.02.2020
	if(isset($data['where'])){
		$where = $data['where'];
		$ci->db->where($where);
	}
	//======END CODE=======//
	
	$row =  $ci->db->get("$table")->result();
	
	
	$data_link='';
	$cmb .="<option value=null>--Pilih Data--</option>";

    foreach ($row as $key => $val){
		$dt='';
		foreach($data['field_link'] as $key_i => $val_i){
			$fs =$val_i['table']."_". $val_i['field_show'];
			
			$flink = $table.'_'.$key_i; 
			
			$dt .= 'data-link-'.$key_i .'="'. $val->$flink . '"  data-show-' .  $val_i['field_show'] .'="'.$val->$fs . '" ';
		}	
		
		
        $cmb .="<option $dt value='".$val->$pk."'";
		
        $cmb .= $selected==$val->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($val->$field_show)."</option>";
    }
	
    $cmb .="</select>";
    return $cmb;
}


function create_cmb_database($data){
    $ci = get_instance();
	
	$id 	= @$data['id'];
	if($id=="" || $id==null)
		$id = $data['elementId'];
	
	$name 	= @$data['name'];
	if($name=="" || $name==null)
		$name = $data['elementName'];
	
	
	$class 	= @$data['class']; 
	if($class=="" || $class==null)
		$class = $data['elementClass'];
	
	$attr 	= @$data['elementAtrribute']; 
	
	
	
	$pk 			= $data['primary_key'];
	$table 			= $data['table']; 
	$field_link 	= $data['field_link'];
	$selected 		= $data['selected'];
	$field_show 	= $data['field_show'];
	$where			= @$data['where'];
    
	//NEW CODE 05.02.2020
	if($where) $ci->db->where($where);
	//======END CODE=======//
	
	$cmb = "<select  id='$id' name='$name' class='form-control select2 $class' style='width: 100%;' $attr>";
	
	
	
    $row = $ci->db->get("$table")->result();
	$data_link='';
	
	$afs =explode(",",$field_show);
	
	$cmb .="<option value=null>--Pilih Data--</option>";
    foreach ($row as $d){
		if($field_link !==''){
			$data_link = $d->$field_link;
		}
		
        $cmb .="<option data-link='$data_link' value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected' >":'>';
		
		foreach($afs as $v){
			 $cmb .= strtoupper($d->$v) . " - ";
		}
		
		$ec  = substr($cmb,-3);
		if($ec==" - "){
			$cmb = substr($cmb,0,-3);	
		}
		
		$cmb .="</option>";
    }
	
    $cmb .="</select>";
    return $cmb;  
}

function create_cmb_database_bigdata($data){
    $ci = get_instance();
	
	$id 	= @$data['id'];
	if($id=="" || $id==null)
		$id = $data['elementId'];
	
	$name 	= @$data['name'];
	if($name=="" || $name==null)
		$name = $data['elementName'];
	
	
	$class 	= @$data['class']; 
	if($class=="" || $class==null)
		$class = $data['elementClass'];
	
	$attr 	= @$data['elementAtrribute']; 
	
	
	$pk 	= $data['primary_key'];
	$table 	= $data['table']; 
	$field_link = $data['field_link'];
	$selected = $data['selected'];
	$field_show = $data['field_show'];
	
	
	
    $cmb = "<select  id='$id' name='$name' class='form-control $class' 
					 data-table='$table' 
					 data-primary = '$pk'
					 data-flink='$field_link' 
					 data-select='$selected' 
					 data-fshow='$field_show'
					 style='width: 100%;'
					 $attr
					 >";
	
	$cmb .="<option value=null>--Pilih Data--</option>";
    $cmb .="</select>";
    return $cmb;  
}


function selectChain($data){
	 $ci = get_instance();
	
	$id 	= @$data['id'];
	if($id=="" || $id==null)
		$id = $data['elementId'];
	
	$name 	= @$data['name'];
	if($name=="" || $name==null)
		$name = $data['elementName'];
	
	
	$class 	= @$data['class']; 
	if($class=="" || $class==null)
		$class = $data['elementClass'];
	
	$attr 	= @$data['elementAtrribute']; 
	
	
	$pk 	= $data['primary_key'];
	$table 	= $data['table']; 
	$field_link = $data['field_link'];
	$selected = $data['selected'];
	$field_show = $data['field_show'];
	
	
	
    $cmb = "<select  id='$id' name='$name' class='form-control $class' 
					 data-table='$table' 
					 data-primary = '$pk'
					 data-flink='$field_link' 
					 data-select='$selected' 
					 data-fshow='$field_show'
					 style='width: 100%;'
					 $attr
					 >";
	
	$cmb .="<option value=null>--Pilih Data--</option>";
    $cmb .="</select>";
    return $cmb;
}


function val($data,$array=FALSE){
	$d1 = json_encode($data);
	return json_decode($d1,$array);
}


function url($func=""){
	
		$ci = get_instance();
		
		$Reflection = new ReflectionClass($ci);
		$dir	 = dirname($Reflection->getFilename());
		$folders = explode(DIRECTORY_SEPARATOR,$dir);
		
		$fparent = end($folders);
		
		return site_url() . $fparent . "/" . $Reflection->getName() . "/" . $func;


}


