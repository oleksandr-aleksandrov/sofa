<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gordian
 */

?>

</main>

<footer class="main-footer text-center m-0">
    <div class="container">
        <hr class="hr-footer-top">
        <div class="row py-2">
            <div class="col-sm-12 col-md-8 mx-auto">
                <ul class="footer-contact-information list-style-none p-0 d-flex flex-column flex-sm-row justify-content-around">
                    <li>
                        <a href="tel:+3809577777777">
                            +3809577777777
                        </a>
                    </li>
                    <li>
                        <a href="tel:+3809577777777">
                            +3809577777777
                        </a>
                    </li>
                    <li>
                        <a href="tel:+3809577777777">
                            +3809577777777
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@gmail.com">
                            info@gmail.com
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <hr class="hr-footer-bottom">
        <div class="col-md-8 mx-auto d-flex flex-row aling-center justify-content-between align-items-center">
            <p class="footer-copyright pt-3 pb-4 m-0">© <?php echo date("Y"); ?> Grodian Knot</p>
            <p class="footer-search m-0 pt-3 pb-4">
                <a href="/  ?s=*">
                    <span class="oi oi-magnifying-glass"></span>
                    SEARCH</a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
