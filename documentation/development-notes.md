# Quartiersplattform
Notizen zur Entwicklung der Quarrtiersplattform
<p>
  <img src="https://img.shields.io/github/license/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="License"/>
  <!-- <img src="https://img.shields.io/github/repo-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Repo Size"/> -->
  <img src="https://img.shields.io/github/commit-activity/w/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Commits"/>
  <img src="https://img.shields.io/tokei/lines/github/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Lines of code"/>
  <img src="https://img.shields.io/github/languages/code-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Code Size"/>
</p>
<br><br>

# Image Sizes (Ratio)

| Name          | S       | M       | M(2)    | M(3)    | L       |
| ------------- | ------- | ------- | ------- | ------- | ------- |
| Square 1:1    | 80x80   | 180x180 | 300x300 | -       | 400x400 |
| Preview 4:3   | 160x120 | 200x150 | 400x300 | 600x450 | 800x600 |
| Landscape 2:1 | 400x200 | 750x375 | -       | -       | 970x485 |

<br><br>

# Noted Queries 

#### Loop Posts (list)

```php
$args = array(
	'post_type'=>'veranstaltungen', 
	'post_status'=>'publish', 
	'posts_per_page'=> -1
);
query_posts( $args );
// loop
if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();
        get_template_part( 'elements/card', 'veranstaltungen');
    }
}
```

## WP_CLI
[Documentation](https://developer.wordpress.org/cli/commands/)

### Plesk WP Tookit

```bash
plesk ext wp-toolkit --wp-cli -instance-id 1 -- media regenerate --yes
plesk ext wp-toolkit --list
```
## WP-CLI Install

#### install needed dependencies 

```bash
# check php version
php -v 
# in root dir
yum install php-json 
yum install php-mysql 
yum install php-mysqli 
# check mysqli
php -m | grep mysql
# install GD
yum install gd gd-devel php-gd
service httpd restart
```

#### install WP-Cli

See [WP-CLI](https://wp-cli.org) for instructions


### WP-CLI Regenerate Thumbnails
[Source](https://developer.wordpress.org/cli/commands/media/regenerate/)
```bash
# path to wp dir
cd var/www/vhosts/arrenberg.studio/ap1.arrenberg.studio/ 
# in wp dir
wp media regenerate --allow-root 
```


## Change Meta name
[Link](https://support.advancedcustomfields.com/forums/topic/changing-field-name-question/)
```php 
UPDATE wp_postmeta
SET meta_key='new_name'
where meta_key='old_name';

UPDATE wordpress.wp_postmeta
SET meta_key='_new_name'
where meta_key='_old_name';
```
[Other](https://support.advancedcustomfields.com/forums/topic/best-practice-for-changing-custom-fields/)
```php 
UPDATE wp_postmeta
SET meta_key = 'new_field_name'
WHERE meta_key = 'old_field_name';
# and 
UPDATE wp_postmeta
SET meta_key = '_new_field_name'
WHERE meta_key = '_old_field_name';
```


## Post Taxonomy Drop Down

```php
// dropdown button taxonomy
// CTP anmerkungen TAX version
function add_theme_box() {
    add_meta_box('theme_box_ID', __('Version'), 'your_styling_function', 'anmerkungen', 'side', 'core');
}   
function add_theme_menus() {
    if ( ! is_admin() )
        return;
    add_action('admin_menu', 'add_theme_box');
    /* Use the save_post action to save new post data */
    add_action('save_post', 'save_taxonomy_data');
}
add_theme_menus();
// This function gets called in edit-form-advanced.php
function your_styling_function($post) {
    echo '<input type="hidden" name="taxonomy_noncename" id="taxonomy_noncename" value="' . wp_create_nonce( 'taxonomy_theme' ) . '" />';
    // Get all theme taxonomy terms
    $themes = get_terms('version', 'hide_empty=0'); 
?>
<select name='post_theme' id='post_theme'>
    <!-- Display themes as options -->
    <?php $names = wp_get_object_terms($post->ID, 'version'); ?>
        <option class='theme-option' value=''<?php if (!count($names)) echo "selected";?>>None</option>
        <?php
		foreach ($themes as $theme) {
			if (!is_wp_error($names) && !empty($names) && !strcmp($theme->slug, $names[0]->slug)) 
				echo "<option class='theme-option' value='" . $theme->slug . "' selected>" . $theme->name . "</option>\n"; 
			else
				echo "<option class='theme-option' value='" . $theme->slug . "'>" . $theme->name . "</option>\n"; 
		}
   ?>
</select>    
<?php
}

function save_taxonomy_data($post_id) {
// verify this came from our screen and with proper authorization.
 
    if ( !wp_verify_nonce( $_POST['taxonomy_noncename'], 'taxonomy_theme' )) {
        return $post_id;
    }
 
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;
 
    // Check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
 
    // OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id);
    if (($post->post_type == 'anmerkungen') || ($post->post_type == 'page')) { 
           // OR $post->post_type != 'revision'
           $theme = $_POST['post_theme'];
       wp_set_object_terms( $post_id, $theme, 'version' );
    }
    return $theme;
}
```

### Remember
```php
if(parse_url($_SERVER['HTTP_REFERER'])['host'] == parse_url(get_site_url())['host']) // already on site :: else new user
```
