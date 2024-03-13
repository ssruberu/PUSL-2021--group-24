<?php
include 'config.php';
?>
<?php 
include 'usernavbar.php';
?>

    
    <main>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Enter university name">
            <button onclick="search()">Search</button>
        </div>
        <div id="results">
            <!-- Search results will be displayed here -->
        </div>
    </main>
   

    <?php
    include 'footer.php';
    ?>
