<?php
/**
 * Feedback
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<h4>Was wünschst du dir von der Quartiersplattform?</h4>

<?php acf_form_head(); ?>
<?php acf_form('feedback-form'); ?>

<!-- for testing -->
<br>
<p>Schau dir den Entwicklungsprozess an</p>
<a class="button" href="<?php echo get_site_url(); ?>/anmerkungen">Feedback Liste</a>