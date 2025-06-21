<?php include 'app/views/shares/header.php'; ?>
<h1>Danh sách sản phẩm</h1>
<a href="/PHAN_NHUT_QUY/ProductViews/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>
<ul class="list-group" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</ul>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/PHAN_NHUT_QUY/api/product')
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            data.forEach(product => {
                const productItem = document.createElement('li');
                productItem.className = 'list-group-item';
                productItem.innerHTML = `
                    <img src="/PHAN_NHUT_QUY/${product.image}" alt="${product.name}" style="max-width:120px;max-height:120px;object-fit:cover;display:block;margin-bottom:10px;">
                    <h2>
                        <a href="/PHAN_NHUT_QUY/ProductViews/show/${product.id}">
                            ${product.name}
                        </a>
                    </h2>
                    <p>${product.description}</p>
                    <p>Giá: ${product.price} VND</p>
                    <p>Danh mục: ${product.category_name}</p>
                    <a href="/PHAN_NHUT_QUY/ProductViews/edit/${product.id}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                `;
                productList.appendChild(productItem);
            });
        });
});

function deleteProduct(id) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
        fetch(`/PHAN_NHUT_QUY/api/product/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product deleted successfully') {
                location.reload();
            } else {
                alert('Xóa sản phẩm thất bại');
            }
        });
    }
}
</script>