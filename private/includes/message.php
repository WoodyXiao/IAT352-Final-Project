<!-- -------------------- for the flash message of log in successfully --------------------  -->

<?php if (isset($_SESSION['message'])) { ?>
    <div class="msg <?php echo $_SESSION['type']; ?>">
        <li><?php echo $_SESSION['message'] ?></li>

        <?php
        unset($_SESSION['message']); // ---> unset the sesstion, destroy the flash message.
        unset($_SESSION['type']);
        ?>
    </div>
<?php } ?>