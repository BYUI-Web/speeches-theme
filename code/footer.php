</div>
</main>

<!--**********************************************
* BYU-Idaho's Footer (copy and paste from BYU-I stylesheet)
***********************************************-->


</section> <!-- end site-content -->

  <!-- footer include -->
  <!-- footer.html -->

<?php if ( is_single( array('devotional', 'forum') )) : ?>
<script type="text/javascript">
  var disqus_shortname = 'byuidahospeeches'; 
  (function () {
    var s = document.createElement('script'); s.async = true;
    s.type = 'text/javascript';
    s.src = '//' + disqus_shortname + '.disqus.com/count.js';
    (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
  }());
</script>
<?php endif; ?>
<script src="<?php bloginfo('template_url') ?>/assets/js/vendor/picturefill.min.js"></script>
</body>
</html>
