<?php
/* Template Name: Registration */
?>

<?php if (isset($_POST["user_email"]) && isset($_POST["user_password"])) {


    $user_password  = esc_attr($_POST["user_password"]);
    $user_email     = esc_attr($_POST["user_email"]);
    $user_name      = esc_attr($_POST["display_name"]);

    $user_data = array(
        'user_login'    =>      $user_login,
        'user_pass'     =>      $user_password,
        'user_email'    =>      $user_email,
        'display_name'  =>      $user_name,
    );

    // Inserting new user to the db
    wp_insert_user($user_data);

    $creds = array();
    $creds['user_login'] = $user_name;
    $creds['user_password'] = $user_password;
    $creds['remember'] = true;

    $user = wp_signon($creds, false);

    $userID = $user->ID;

    wp_set_current_user($userID, $user_login);
    wp_set_auth_cookie($userID, true, false);
    do_action('wp_login', $user_login);
}

get_header();

if (is_user_logged_in()) : echo 'SUCCESS'; ?>
    <h1>User logged in! </h1>
<?php else : echo 'FAIL!'; ?>
    <h2>Register</h2>
    <form id="user-credentials" method="post" action="<?php the_permalink(); ?>">
        <p><input name="display_name" type="text" placeholder="Name" /></p>
        <p><input name="user_email" type="text" placeholder="Email" /></p>
        <p><input name="user_password" type="password" placeholder="Password" /></p>
        <p><input type="submit" class="button blue size-s" value="Submit" /></p>
    </form>
<?php endif; ?>
<?php get_footer() ?>