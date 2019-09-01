<?php
/*
  Plugin Name: External Database Authentication Reloaded
  Plugin URI: http://www.7mediaws.org/extend/plugins/external-db-auth-reloaded/
  Description: Used to externally authenticate WP users with an existing user DB.
  Version: 1.2.3
  Author: Joshua Parker
  Author URI: http://www.desiringfreedom.com/
  Original Author: Charlene Barina
  Original Author URI: http://www.ploofle.com

  Copyright 2007  Charlene Barina  (email : cbarina@u.washington.edu)

  This program is free software; you can redistribute it and/or modify
  it  under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

require('medoo.php');

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', WP_CONTENT_DIR . '/error.' . date('m-d-Y') . '.txt');

function external_db_auth_activate()
{
    add_option('external_db_type', "MySQL", "External database type");
    add_option('external_host', "", "External database hostname");
    add_option('external_db_port', "", "Database port (if non-standard)");
    add_option('external_db', "", "External database name");
    add_option('external_db_user', "", "External database username");
    add_option('external_db_pw', "", "External database password");
    add_option('external_db_table', "", "External database table for authentication");
    add_option('external_db_namefield', "", "External database field for username");
    add_option('external_db_pwfield', "", "External database field for password");
    add_option('external_db_first_name', "");
    add_option('external_db_last_name', "");
    add_option('external_db_user_url', "");
    add_option('external_db_user_email', "");
    add_option('external_db_description', "");
    add_option('external_db_aim', "");
    add_option('external_db_yim', "");
    add_option('external_db_jabber', "");
    add_option('external_db_enc', "", "Type of encoding for external db (default SHA1? or MD5?)");
    add_option('external_db_other_enc', "");
    add_option('external_db_error_msg', "", "Custom login message");
    add_option('external_db_role_bool', '');
    add_option('external_db_role', '');
    add_option('external_db_role_value', '');
    add_option('external_db_site_url', '');
}

function external_db_auth_init()
{
    register_setting('external_db_auth', 'external_db_type');
    register_setting('external_db_auth', 'external_host');
    register_setting('external_db_auth', 'external_db_port');
    register_setting('external_db_auth', 'external_db');
    register_setting('external_db_auth', 'external_db_user');
    register_setting('external_db_auth', 'external_db_pw');
    register_setting('external_db_auth', 'external_db_table');
    register_setting('external_db_auth', 'external_db_namefield');
    register_setting('external_db_auth', 'external_db_pwfield');
    register_setting('external_db_auth', 'external_db_first_name');
    register_setting('external_db_auth', 'external_db_last_name');
    register_setting('external_db_auth', 'external_db_user_url');
    register_setting('external_db_auth', 'external_db_user_email');
    register_setting('external_db_auth', 'external_db_description');
    register_setting('external_db_auth', 'external_db_aim');
    register_setting('external_db_auth', 'external_db_yim');
    register_setting('external_db_auth', 'external_db_jabber');
    register_setting('external_db_auth', 'external_db_enc');
    register_setting('external_db_auth', 'external_db_other_enc');
    register_setting('external_db_auth', 'external_db_error_msg');
    register_setting('external_db_auth', 'external_db_role');
    register_setting('external_db_auth', 'external_db_role_bool');
    register_setting('external_db_auth', 'external_db_role_value');
    register_setting('external_db_auth', 'external_db_site_url');
}

//page for config menu
function external_db_auth_add_menu()
{
    add_options_page("External DB settings", "External DB settings", 'manage_options', __FILE__, "external_db_auth_display_options");
}

//actual configuration screen
function external_db_auth_display_options()
{
    $db_types = array(
        'mysql' => 'MySQL',
        'pgsql' => 'PostgreSQL',
        'sybase' => 'Sybase',
        'oracle' => 'Oracle',
        'mssql' => 'MSSQL',
        'sqlite' => 'SQLite'
    );

    ?>
    <div class="wrap">
        <h2><?php _e('External Database Authentication Settings'); ?></h2>        
        <form method="post" action="options.php">
            <?php settings_fields('external_db_auth'); ?>
            <h3><?php _e('External Database Settings'); ?></h3>
            <strong><?php _e('Make sure your WP admin account exists in the external db prior to saving these settings.'); ?></strong>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e('Database type'); ?></th>
                    <td><select name="external_db_type" >
                            <option value=""></option>
                            <?php
                            foreach ($db_types as $key => $value) { //print out radio buttons
                                echo '<option value="' . $key . '"' . selected($key, get_option('external_db_type'), false) . '>' . $value . '<br/>';
                            }

                            ?>
                        </select> 
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('External DB Host'); ?></label></th>
                    <td><input type="text" name="external_host" value="<?php echo get_option('external_host'); ?>" /> 
                        <span class="description"><?php _e('(Often localhost but if your external DB is on a different server from your WP site, then you will need to enter either and IP address or domain name.)'); ?></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('External DB Port'); ?></label></th>
                    <td><input type="text" name="external_db_port" value="<?php echo get_option('external_db_port'); ?>" /> 
                        <span class="description"><?php _e('Only set this if you have a non-standard port for connecting.'); ?></span></td>
                </tr>        
                <tr valign="top">
                    <th scope="row"><label><?php _e('External DB Name'); ?></label></th>
                    <td><input type="text" name="external_db" value="<?php echo get_option('external_db'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('External DB Username'); ?></label></th>
                    <td><input type="text" name="external_db_user" value="<?php echo get_option('external_db_user'); ?>" /> 
                        <span class="description"><?php _e('(recommend select privileges only)'); ?></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('External DB Password'); ?></label></th>
                    <td><input type="password" name="external_db_pw" value="<?php echo get_option('external_db_pw'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('User table'); ?></label></th>
                    <td><input type="text" name="external_db_table" value="<?php echo get_option('external_db_table'); ?>" /></td>
                </tr>
            </table>

            <h3><?php _e('External Database Source Fields'); ?></h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label><?php _e('Username'); ?></label></th>
                    <td><input type="text" name="external_db_namefield" value="<?php echo get_option('external_db_namefield'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Password'); ?></label></th>
                    <td><input type="text" name="external_db_pwfield" value="<?php echo get_option('external_db_pwfield'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Password encryption method'); ?></th>
                    <td><select name="external_db_enc">
                            <option value=""></option>
                            <option value="SHA1"<?php echo selected('SHA1', get_option('external_db_enc'), false); ?>><?php _e('SHA1'); ?></option>
                            <option value="SHA256"<?php echo selected('SHA256', get_option('external_db_enc'), false); ?>><?php _e('SHA256'); ?></option>
                            <option value="MD5"<?php echo selected('MD5', get_option('external_db_enc'), false); ?>><?php _e('MD5'); ?></option>
                            <option value="HASH"<?php echo selected('HASH', get_option('external_db_enc'), false); ?>><?php _e('HASH'); ?></option>
                            <option value="PHPass"<?php echo selected('PHPass', get_option('external_db_enc'), false); ?>><?php _e('PHPass'); ?></option>
                            <option value="Other"<?php echo selected('Other', get_option('external_db_enc'), false); ?>><?php _e('Other'); ?></option>
                        </select> 
                        <span class="description"><?php _e('using "Other" requires you to enter custom PHP code into the Hash Code input field.)'); ?></td>            
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Hash code'); ?></label></th>
                    <td><input type="text" name="external_db_other_enc" size="50" value="<?php echo get_option('external_db_other_enc'); ?>" /> 
                        <span class="description"><?php _e('Only will run if "Other" is selected and needs to be PHP code. Variable you need to set is $password2, and you have access to (original) $username and $password.'); ?></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Role check'); ?></label></th>
                    <td><input type="text" name="external_db_role" value="<?php echo get_option('external_db_role'); ?>" />
                        <br />
                        <select name="external_db_role_bool">
                            <option value=""></option>
                            <option value="is"<?php echo selected('is', get_option('external_db_role_bool'), false); ?>><?php _e('Is Equal To'); ?></option>
                            <option value="greater than"<?php echo selected('greater than', get_option('external_db_role_bool'), false); ?>><?php _e('Greater Than'); ?></option>
                            <option value="less than"<?php echo selected('less than', get_option('external_db_role_bool'), false); ?>><?php _e('Less Than'); ?></option>
                        </select><br />
                        <input type="text" name="external_db_role_value" value="<?php echo get_option('external_db_role_value'); ?>" /> 
                        <span class="description"><?php _e('Use this if you have certain user role ids in your external database to further restrict allowed logins.  If unused, leave fields blank.'); ?></span></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('First name'); ?></label></th>
                    <td><input type="text" name="external_db_first_name" value="<?php echo get_option('external_db_first_name'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Last name'); ?></label></th>
                    <td><input type="text" name="external_db_last_name" value="<?php echo get_option('external_db_last_name'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Homepage'); ?></label></th>
                    <td><input type="text" name="external_db_user_url" value="<?php echo get_option('external_db_user_url'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Email'); ?></label></th>
                    <td><input type="text" name="external_db_user_email" value="<?php echo get_option('external_db_user_email'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Bio/description'); ?></label></th>
                    <td><input type="text" name="external_db_description" value="<?php echo get_option('external_db_description'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('AIM screen name'); ?></label></th>
                    <td><input type="text" name="external_db_aim" value="<?php echo get_option('external_db_aim'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('YIM screen name'); ?></label></th>
                    <td><input type="text" name="external_db_yim" value="<?php echo get_option('external_db_yim'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('JABBER screen name'); ?></label></th>
                    <td><input type="text" name="external_db_jabber" value="<?php echo get_option('external_db_jabber'); ?>" /></td>
                </tr>
            </table>
            <h3><?php _e('Other'); ?></h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label><?php _e('External Site URL'); ?></label></th>
                    <td><input type="text" name="external_db_site_url" value="<?php echo get_option('external_db_site_url'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Custom login message'); ?></th>
                    <td><textarea name="external_db_error_msg" cols=40 rows=4><?php echo htmlspecialchars(get_option('external_db_error_msg')); ?></textarea> <span class="description"><?php _e('Shows up in login box, e.g., to tell them where to get an account. You can use HTML in this text.'); ?></td>
                </tr>        
            </table>

            <p class="submit">
                <input type="submit" name="Submit" id="submit" class="button button-primary" value="Save changes" />
            </p>
        </form>
    </div>
    <?php
}

function check_password_hash($method, $pass, $hash)
{
    if ($method === 'SHA1') {
        if (sha1($pass) === $hash) {
            return true;
        }
    } elseif ($method === 'SHA256') {
        if (hash('sha256', $pass) === $hash) {
            return true;
        }
    } elseif ($method === 'MD5') {
        if (md5($pass) === $hash) {
            return true;
        }
    } elseif ($method === 'HASH') {
        if (external_check_password($pass, $hash)) {
            return true;
        }
    } elseif ($method === 'PHPass') {
        if (external_check_password($pass, $hash)) {
            return true;
        }
    }
}

function external_hash_password($password)
{
    // By default, use the portable hash from phpass
    $external_hasher = new PasswordHash(8, FALSE);

    return $external_hasher->HashPassword($password);
}

function external_check_password($password, $hash, $user_id = '')
{

    // If the hash is still md5...
    if (strlen($hash) <= 32) {
        $check = ( $hash == md5($password) );
        if ($check && $user_id) {
            // Rehash using new hash.
            external_set_password($password, $user_id);
            $hash = external_hash_password($password);
        }

        return apply_filters('check_password', $check, $password, $hash, $user_id);
    }

    // If the stored hash is longer than an MD5, presume the
    // new style phpass portable hash.
    $external_hasher = new PasswordHash(8, FALSE);

    $check = $external_hasher->CheckPassword($password, $hash);

    return apply_filters('check_password', $check, $password, $hash, $user_id);
}

//actual meat of plugin - essentially, you're setting $username and $password to pass on to the system.
//You check from your external system and insert/update users into the WP system just before WP actually
//authenticates with its own database.
function external_db_auth_check_login($username, $password)
{
    $database = new medoo(array(
        // required
        'database_type' => get_option('external_db_type'),
        'database_name' => get_option('external_db'),
        'server' => get_option('external_host'),
        'username' => get_option('external_db_user'),
        'password' => get_option('external_db_pw'),
        'charset' => 'utf8',
        // optional
        'port' => get_option('external_db_port'),
        // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        'option' => array(
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        )
    ));

    require_once('./wp-includes/registration.php');
    require_once('./wp-includes/user.php');
    require_once('./wp-includes/pluggable.php');
    require_once('./wp-includes/class-phpass.php');

    $uname = get_option('external_db_namefield');
    $upass = get_option('external_db_pwfield');
    $mem = get_option('external_db_table');

    $data = $database->query("SELECT $uname, $upass FROM $mem WHERE $uname = '$username'")->fetchAll();

    //do the password hash for comparing
    switch (get_option('external_db_enc')) {
        case "SHA1" :
            $password2 = sha1($password);
            break;
        case "MD5" :
            $password2 = md5($password);
            break;
        case "HASH" :
            $password2 = external_check_password($password, $data[0][$upass]);
            break;
        case "PHPass" :
            $password2 = external_check_password($password, $data[0][$upass]);
            break;
        case "Other" :             //right now defaulting to plaintext.  People can change code here for their own special hash
            eval(get_option('external_db_other_enc'));
            break;
    }

    if (count($data) > 0) {
        //then check to see if pw matches and get other fields...
        $sqlfields['first_name'] = get_option('external_db_first_name');
        $sqlfields['last_name'] = get_option('external_db_last_name');
        $sqlfields['user_url'] = get_option('external_db_user_url');
        $sqlfields['user_email'] = get_option('external_db_user_email');
        $sqlfields['description'] = get_option('external_db_description');
        $sqlfields['aim'] = get_option('external_db_aim');
        $sqlfields['yim'] = get_option('external_db_yim');
        $sqlfields['jabber'] = get_option('external_db_jabber');
        $sqlfields['external_db_role'] = get_option('external_db_role');

        foreach ($sqlfields as $key => $value) {
            if ($value == "")
                unset($sqlfields[$key]);
        }
        $sqlfields2 = implode(", ", $sqlfields);

        //just so queries won't error out if there are no relevant fields for extended data.
        if ($sqlfields2 === null) {
            $sqlfields2 = get_option('external_db_namefield');
        }

        if (get_option('external_db_enc') == 'Other') {
            $query = $database->query("SELECT $sqlfields2 FROM " . get_option('external_db_table') . " WHERE " . get_option('external_db_namefield') . " = '$username' AND " . get_option('external_db_pwfield') . " = '$password2'")->fetchAll();
            $check = $database->query("SELECT $sqlfields2 FROM " . get_option('external_db_table') . " WHERE " . get_option('external_db_namefield') . " = '$username' AND " . get_option('external_db_pwfield') . " = '$password2'")->fetchAll();
        } else {
            $query = $database->query("SELECT $sqlfields2 FROM " . get_option('external_db_table') . " WHERE " . get_option('external_db_namefield') . " = '$username'")->fetchAll();
        }

        if (check_password_hash(get_option('external_db_enc'), $password, $data[0][$upass]) || count($check) > 0) {    //create/update wp account from external database if login/pw exact match exists in that db
            $extfields = $query[0];
            $process = TRUE;

            //check role, if present.
            $role = get_option('external_db_role');
            if (!empty($role)) { //build the role checker too					
                $rolevalue = $extfields[$sqlfields['external_db_role']];
                $rolethresh = get_option('external_db_role_value');
                $rolebool = get_option('external_db_role_bool');
                global $external_error;
                if ($rolebool == 'is') {
                    if ($rolevalue == $rolethresh) {
                        
                    } else {
                        $username = NULL;
                        $external_error = "wrongrole";
                        $process = FALSE;
                    }
                }
                if ($rolebool == 'greater than') {
                    if ($rolevalue > $rolethresh) {
                        
                    } else {
                        $username = NULL;
                        $external_error = "wrongrole";
                        $process = FALSE;
                    }
                }
                if ($rolebool == 'less than') {
                    if ($rolevalue < $rolethresh) {
                        
                    } else {
                        $username = NULL;
                        $external_error = "wrongrole";
                        $process = FALSE;
                    }
                }
            }
            //only continue with user update/creation if login/pw is valid AND, if used, proper role perms
            if ((get_option('external_db_enc') === 'HASH' || get_option('external_db_enc') === 'PHPass') && external_check_password($password, $data[0][$upass])) {
                if ($process) {
                    $userarray['user_login'] = $username;
                    $userarray['user_pass'] = $password;
                    $userarray['first_name'] = $extfields[$sqlfields['first_name']];
                    $userarray['last_name'] = $extfields[$sqlfields['last_name']];
                    $userarray['user_url'] = $extfields[$sqlfields['user_url']];
                    $userarray['user_email'] = $extfields[$sqlfields['user_email']];
                    $userarray['description'] = $extfields[$sqlfields['description']];
                    $userarray['aim'] = $extfields[$sqlfields['aim']];
                    $userarray['yim'] = $extfields[$sqlfields['yim']];
                    $userarray['jabber'] = $extfields[$sqlfields['jabber']];
                    $userarray['display_name'] = $extfields[$sqlfields['first_name']] . " " . $extfields[$sqlfields['last_name']];

                    //also if no extended data fields
                    if ($userarray['display_name'] == " ")
                        $userarray['display_name'] = $username;

                    $database = null;

                    //looks like wp functions clean up data before entry, so I'm not going to try to clean out fields beforehand.
                    if ($id = username_exists($username)) {   //just do an update
                        $userarray['ID'] = $id;
                        wp_update_user($userarray);
                    } else
                        wp_insert_user($userarray);          //otherwise create
                }
            }

            if (get_option('external_db_enc') == 'MD5' || get_option('external_db_enc') == 'SHA1' || get_option('external_db_enc') == 'SHA256') {
                if ($process) {
                    $userarray['user_login'] = $username;
                    $userarray['user_pass'] = $password;
                    $userarray['first_name'] = $extfields[$sqlfields['first_name']];
                    $userarray['last_name'] = $extfields[$sqlfields['last_name']];
                    $userarray['user_url'] = $extfields[$sqlfields['user_url']];
                    $userarray['user_email'] = $extfields[$sqlfields['user_email']];
                    $userarray['description'] = $extfields[$sqlfields['description']];
                    $userarray['aim'] = $extfields[$sqlfields['aim']];
                    $userarray['yim'] = $extfields[$sqlfields['yim']];
                    $userarray['jabber'] = $extfields[$sqlfields['jabber']];
                    $userarray['display_name'] = $extfields[$sqlfields['first_name']] . " " . $extfields[$sqlfields['last_name']];

                    //also if no extended data fields
                    if ($userarray['display_name'] == " ")
                        $userarray['display_name'] = $username;

                    $database = null;

                    //looks like wp functions clean up data before entry, so I'm not going to try to clean out fields beforehand.
                    if ($id = username_exists($username)) {   //just do an update
                        $userarray['ID'] = $id;
                        wp_update_user($userarray);
                    } else
                        wp_insert_user($userarray);
                }
            }

            if (get_option('external_db_enc') == 'Other') {
                if ($process) {
                    $userarray['user_login'] = $username;
                    $userarray['user_pass'] = $password;
                    $userarray['first_name'] = $extfields[$sqlfields['first_name']];
                    $userarray['last_name'] = $extfields[$sqlfields['last_name']];
                    $userarray['user_url'] = $extfields[$sqlfields['user_url']];
                    $userarray['user_email'] = $extfields[$sqlfields['user_email']];
                    $userarray['description'] = $extfields[$sqlfields['description']];
                    $userarray['aim'] = $extfields[$sqlfields['aim']];
                    $userarray['yim'] = $extfields[$sqlfields['yim']];
                    $userarray['jabber'] = $extfields[$sqlfields['jabber']];
                    $userarray['display_name'] = $extfields[$sqlfields['first_name']] . " " . $extfields[$sqlfields['last_name']];

                    //also if no extended data fields
                    if ($userarray['display_name'] == " ")
                        $userarray['display_name'] = $username;

                    $database = null;

                    //looks like wp functions clean up data before entry, so I'm not going to try to clean out fields beforehand.
                    if ($id = username_exists($username)) {   //just do an update
                        $userarray['ID'] = $id;
                        wp_update_user($userarray);
                    } else
                        wp_insert_user($userarray);
                }
            }
        }
        else { //username exists but wrong password...			
            global $external_error;
            $external_error = "wrongpw";
            $username = NULL;
        }
    } else {  //don't let login even if it's in the WP db - it needs to come only from the external db.
        global $external_error;
        $external_error = "notindb";
        $username = NULL;
    }
}

//gives warning for login - where to get "source" login
function external_db_auth_warning()
{
    echo "<p class=\"message\">" . get_option('external_db_error_msg') . "</p>";
}

function external_db_errors()
{
    global $error;
    global $external_error;
    if ($external_error == "notindb")
        return "<strong>ERROR:</strong> Username not found.";
    else if ($external_error == "wrongrole")
        return "<strong>ERROR:</strong> You don't have permissions to log in.";
    else if ($external_error == "wrongpw")
        return "<strong>ERROR:</strong> Invalid password.";
    else
        return $error;
}

//hopefully grays stuff out.
function external_db_warning()
{
    echo '<strong style="color:red;">Any changes made below WILL NOT be preserved when you login again. You have to change your personal information per instructions found @ <a href="' . get_option('external_db_site_url') . '">login box</a>.</strong>';
}

//disables the (useless) password reset option in WP when this plugin is enabled.
function external_db_show_password_fields()
{
    return 0;
}
/*
 * Disable functions.  Idea taken from http auth plugin.
 */

function disable_function_register()
{
    $errors = new WP_Error();
    $errors->add('registerdisabled', __('User registration is not available from this site, so you can\'t create an account or retrieve your password from here. See the message above.'));

    ?></form><br /><div id="login_error"><?php _e('User registration is not available from this site, so you can\'t create an account or retrieve your password from here. See the message above.'); ?></div>
    <p id="backtoblog"><a href="<?php bloginfo('url'); ?>/" title="<?php _e('Are you lost?') ?>"><?php printf(__('&larr; Back to %s'), get_bloginfo('title', 'display')); ?></a></p>
    <?php
    exit();
}

function disable_function()
{
    $errors = new WP_Error();
    $errors->add('registerdisabled', __('User registration is not available from this site, so you can\'t create an account or retrieve your password from here. See the message above.'));
    login_header(__('Log In'), '', $errors);

    ?>
    <p id="backtoblog"><a href="<?php bloginfo('url'); ?>/" title="<?php _e('Are you lost?') ?>"><?php printf(__('&larr; Back to %s'), get_bloginfo('title', 'display')); ?></a></p>
    <?php
    exit();
}

function external_db_translate()
{
    $plugin_dir = basename(dirname(__FILE__));
    load_plugin_textdomain('external-db', false, $plugin_dir);
}
add_action('plugins_loaded', 'external_db_translate');
add_action('admin_init', 'external_db_auth_init');
add_action('admin_menu', 'external_db_auth_add_menu');
add_action('wp_authenticate', 'external_db_auth_check_login', 1, 2);
add_action('lost_password', 'disable_function');
//add_action('user_register', 'disable_function');
add_action('register_form', 'disable_function_register');
add_action('retrieve_password', 'disable_function');
add_action('password_reset', 'disable_function');
add_action('profile_personal_options', 'external_db_warning');
add_filter('login_errors', 'external_db_errors');
add_filter('show_password_fields', 'external_db_show_password_fields');
add_filter('login_message', 'external_db_auth_warning');

register_activation_hook(__FILE__, 'external_db_auth_activate');
