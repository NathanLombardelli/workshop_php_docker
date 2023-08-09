<h2>Index</h2>

    <ul>

        <?php foreach ($products as $product):?>
            <li>
                <?= $product['productName']  ?>
            </li>
        <?php endforeach; ?>
    </ul>
