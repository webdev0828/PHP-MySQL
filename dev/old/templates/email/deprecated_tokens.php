<?PHP

$con = preg_replace("/_id_/", "{id}", $con);
$con = preg_replace("/_username_/", "{username}", $con);
$con = preg_replace("/_password_/", "{password}", $con);
$con = preg_replace("/_firstname_/", "{first_name}", $con);
$con = preg_replace("/_lastname_/", "{last_name}", $con);
$con = preg_replace("/_email_/", "{email}", $con);
$con = preg_replace("/_webhome_/", "{website_home}", $con);
$con = preg_replace("/_affhome_/", "{affiliate_home}", $con);
$con = preg_replace("/_loginpage_/", "{login_page}", $con);
$con = preg_replace("/_afftestimonials_/", "{aff_testimonials}", $con);
$con = preg_replace("/_couponcode_/", "{coupon_code}", $con);
$con = preg_replace("/_afflink_/", "{aff_link}", $con);

?>