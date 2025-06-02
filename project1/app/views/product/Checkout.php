<?php include 'app/views/shared/header.php'; ?> 

<div class="container mt-5">
    <h1 class="mb-4 text-center">Thanh toán</h1> 

    <div class="card shadow-sm p-4">
        <form method="POST" action="/project1/Product/processCheckout"> 
            <div class="mb-3"> 
                <label for="name" class="form-label">Họ tên:</label> 
                <input type="text" id="name" name="name" class="form-control" required> 
            </div> 

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại:</label> 
                <input type="text" id="phone" name="phone" class="form-control" required> 
            </div> 

            <div class="mb-3"> 
                <label for="address" class="form-label">Địa chỉ:</label> 
                <textarea id="address" name="address" class="form-control" rows="3" required></textarea> 
            </div> 

            <button type="submit" class="btn btn-success">Thanh toán</button> 
        </form> 

        <a href="/project1/Product/cart" class="btn btn-link mt-3">← Quay lại giỏ hàng</a> 
    </div>
</div>

<?php include 'app/views/shared/footer.php'; ?>
