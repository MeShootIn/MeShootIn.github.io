function add_friends(){
	let add_button = document.getElementsByClassName("flat_button button_small");
	for(i = 0; i < add_button.length; i += 2){
		add_button[i].click();
	}
}

function del_friends(){
	let del_button = document.getElementsByClassName("ui_actions_menu_item");
	for(i = 0; i < del_button.length; ++i){
		if(del_button[i].innerHTML == "Убрать из друзей"){
			del_button[i].click();
		}
	}
}

function clear_wall(){
	let del_record_button = document.getElementsByClassName("ui_actions_menu_item");
	for(i = 0; i < del_record_button.length; ++i){
		if(del_record_button[i].innerHTML == "Удалить запись"){
			del_record_button[i].click();
		}
	}
}