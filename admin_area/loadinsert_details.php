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
                display:flex;
                justify-content: center;
                margin-top: 20px;
                border-top: 3px solid pink;
            }
        }

</style>

<body>
    <div class="konzol_felulet">
        <div class="menu">
            <a href="index.php?insert_color" class="menu-item">Szín hozzáadása</a>
            <a href="index.php?insert_type" class="menu-item">Ékszertípus hozzáadása</a>
            <a href="index.php?insert_material" class="menu-item">Anyagtípus hozzáadása</a>
        </div>
    </div>
    <!-- ... (a többi rész) ... -->
</body>

