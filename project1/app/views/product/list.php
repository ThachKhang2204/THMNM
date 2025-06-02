<?php include 'app/views/shared/header.php'; ?> 
<?php require_once 'app/helpers/SessionHelper.php'; ?>


<style>
    body {
        background-color: #f8f9fa;
    }
    .product-card {
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        transition: transform 0.2s;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
</style>

<div class="container mt-4">
    <h1 class="mb-4 text-center">Danh sách sản phẩm</h1> 

    <?php if (SessionHelper::isAdmin()) : ?>
    <div class="text-end mb-3">
        <a href="/project1/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
    </div>
<?php endif; ?>


    <div class="row">
        <?php foreach ($products as $product): ?> 
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card p-3 h-100 d-flex flex-column">
                    <?php if ($product->image): ?> 
                        <img src="/project1/<?php echo $product->image; ?>" class="card-img-top mb-3" alt="Product Image">
                    <?php endif; ?> 
                    <h5 class="fw-bold mb-2">
                        <a href="/project1/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h5>
                    <p class="text-muted mb-2"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="mb-1">Giá: <strong><?php echo number_format($product->price, 0, '', ','); ?> VND</strong></p>
                    <p class="mb-3">Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="mt-auto">
    <?php if (SessionHelper::isAdmin()) : ?>
        <a href="/project1/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-warning me-1 mb-1">Sửa</a> 
        <a href="/project1/Product/delete/<?php echo $product->id; ?>" 
           class="btn btn-sm btn-danger me-1 mb-1"
           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
           Xóa
        </a> 
    <?php endif; ?>

    <a href="/project1/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-sm btn-primary mb-1">Thêm vào giỏ hàng</a> 
</div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</div>

<?php include 'app/views/shared/footer.php'; ?>
