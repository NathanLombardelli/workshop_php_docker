<h2>Index</h2>

    <ul>

        <?php foreach ($products as $product):?>
            <li>
                <a href="/product.php?id=<?= $product['productCode'] ?>">
                    <?= $product['productName']  ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
