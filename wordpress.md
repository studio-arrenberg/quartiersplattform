# Wordpress Snippets

## Query

### Loop Posts (list)

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

### Date

#### Post Date
```php
echo get_post_modified_time('F d, Y g:i a', true, null, true); // "März 21, 2017 7:02 pm"
```

## WP_CLI
[Documentation](https://developer.wordpress.org/cli/commands/)

### Plesk WP Tookit

```ssh
plesk ext wp-toolkit --wp-cli -instance-id 1 -- media regenerate --yes
plesk ext wp-toolkit --list
```
### WP-CLI Install

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
```ssh
# path to wp dir
cd var/www/vhosts/arrenberg.studio/ap1.arrenberg.studio/ 
# in wp dir
wp media regenerate --allow-root 
```
