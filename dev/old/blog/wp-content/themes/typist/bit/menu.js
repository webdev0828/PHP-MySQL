/*
This JS handles the menu. 
*/
function toggleByClass(className) {
    jQuery("."+className).slideToggle();
 	jQuery(".icons").toggleClass( "active" );
}
