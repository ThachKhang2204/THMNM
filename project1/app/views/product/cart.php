<?php include 'app/views/shared/header.php'; ?> 

<div class="container mt-4">
    <h1 class="mb-4">Giỏ hàng</h1>

    <?php if (!empty($cart)): ?> 
        <form method="POST" action="/project1/Product/updateCart">
            <ul class="list-group">
                <?php foreach ($cart as $id => $item): ?> 
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <?php if ($item['image']): ?> 
                                    <img src="/project1/<?php echo $item['image']; ?>" alt="Product Image" class="img-fluid rounded">
                                <?php endif; ?> 
                            </div>
                            <div class="col-md-6">
                                <h5><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5> 
                                <p>Giá: <?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?> VND</p> 
                                <div class="input-group" style="max-width: 160px;">
                                    <div class="input-group-prepend">
                                        <button type="submit" name="decrease[<?php echo $id; ?>]" class="btn btn-outline-secondary">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                    <div class="input-group-append">
                                        <button type="submit" name="increase[<?php echo $id; ?>]" class="btn btn-outline-secondary">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> 
                <?php endforeach; ?> 
            </ul>
            <div class="mt-4">
                <a href="/project1/Product" class="btn btn-secondary">Tiếp tục mua sắm</a> 
                <a href="/project1/Product/checkout" class="btn btn-success">Thanh Toán</a> 
            </div>
        </form>
    <?php else: ?> 
        <p>Giỏ hàng của bạn đang trống.</p> 
        <a href="/project1/Product" class="btn btn-primary mt-2">Mua sắm ngay</a>
    <?php endif; ?>
</div>

<?php include 'app/views/shared/footer.php'; ?>
