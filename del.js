let del_button = document.getElementById("list_content").getElementsByClassName("ui_actions_menu_item");
for(i = 0; i < del_button.length; ++i){
	if(del_button[i].innerHTML == "Убрать из друзей"){
		del_button[i].click();
	}
}