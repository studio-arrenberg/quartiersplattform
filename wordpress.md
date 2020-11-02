# Wordpress Snippets

## Table of Contents 

### Query

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

### Date

#### Post Date
```php
echo get_post_modified_time('F d, Y g:i a', true, null, true); // "März 21, 2017 7:02 pm"
```