<!-- Navbar Component -->
<div class="navbar appbar">
    <div class="row no-gutters">
        <div class="col btn-col">
            <!-- Toggle Nav Button Component -->
            <button type="button" class="btn toggle-nav-left">
                <i class="material-icons">menu</i>
            </button>
        </div>

        <div class="col">
            <!-- Page Title Component -->
            <h3><?php echo $pageTitle; ?></h3>
        </div>

        <div class="col">            
            <input type="text" class="search-field" id="<?php echo $endpoint; ?>" placeholder="Pesquisar...">
            <!-- Nav Button Component -->
            <button type="button" class="btn btn-search">
                <i class="material-icons">search</i>
            </button>            
        </div>
    </div>
</div>