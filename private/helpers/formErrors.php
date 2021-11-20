<!-- -------------------- for the register form error showing part -------------------- -->

<!-- display the error in the register part -->
<?php if (count($error) > 0) { ?>
    <div class="msg error">
        <!-- display the error -->
        <?php foreach ($error as $e) { ?>
            <?php echo "<li>" . $e . "</li>" ?>
        <?php } ?>
    </div>
<?php } ?>

<!-- -------------------- end for the register form error showing part -------------------- -->