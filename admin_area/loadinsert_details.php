<style>
        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .menu-item {
            margin: 10px;
            font-size: 18px;
            color: #343a40;
            text-decoration: none;
            border: 2px solid transparent;
            border-radius: 5px;
            padding: 10px;
        }

        .menu-item.active,
        .menu-item:hover {
            border-bottom: 2px solid pink;
        }

        @media (max-width: 768px) {
            .menu {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu-item {
                margin: 10px 0;
            }
        }

</style>

<body>
    <div class="konzol_felulet">
        <div class="menu">
            <a href="list_products.php" class="menu-item">Termék Törlése</a>
            <a href="list_products.php" class="menu-item">Termék Szerkesztése</a>
            <a href="index.php?insert_color" class="menu-item">Szín hozzáadása</a>
            <a href="index.php?insert_type" class="menu-item">Ékszertípus hozzáadása</a>
            <a href="index.php?insert_material" class="menu-item">Anyagfajta hozzáadása</a>
        </div>
    </div>
    <!-- ... (a többi rész) ... -->
</body>

