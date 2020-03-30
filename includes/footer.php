<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <?php
  // Against all best practices.
  if (isset($_add_js_to_footer) && !empty($_add_js_to_footer) && is_array($_add_js_to_footer)) {
    foreach ($_add_js_to_footer as $js) { ?>
    <script src="<?php echo $js ?>"></script>
  <?php }
  }
  ?>
<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        Training app</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
