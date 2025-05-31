
<div class="search-container">
    <form action="search_results.php" method="get" autocomplete="off">
        <input type="search" name="q" class="search-bar" placeholder="Rechercher un produit..." 
               id="searchInput" required>
        <button type="submit" class="search-button">
            <i class="fas fa-search"></i>
        </button>
        <div id="searchSuggestions" class="search-suggestions"></div>
    </form>
</div>

<style>
.search-container {
    position: relative;
    width: 100%;
}

.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: white;
    border: 1px solid #ddd;
    border-radius: 0 0 5px 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    display: none;
    z-index: 1000;
}

.search-suggestions a {
    display: block;
    padding: 10px;
    color: #333;
    text-decoration: none;
    border-bottom: 1px solid #eee;
}

.search-suggestions a:hover {
    background-color: #f5f5f5;
    color: #FC929E;
}
</style>