<?php include 'app/views/shares/header.php'; ?>
<h1>Thêm sản phẩm mới</h1>
<form id="add-product-form">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API và hiển thị tại đây -->
        </select>
    </div>
    <div class="form-group">
        <label for="image">Chọn ảnh sản phẩm:</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
    </div>
    <div class="form-group mt-2">
        <label>Ảnh xem trước:</label><br>
        <img id="preview-image" src="" alt="Ảnh sản phẩm" class="img-thumbnail" style="max-width: 200px; display: none;">
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>
<a href="/PHAN_NHUT_QUY/ProductViews/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Lấy danh sách danh mục từ API và hiển thị
    fetch('/PHAN_NHUT_QUY/api/category')
        .then(response => response.json())
        .then(data => {
            const categorySelect = document.getElementById('category_id');
            data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
        });

    // Xem trước ảnh
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-image');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });

    // Xử lý submit form thêm sản phẩm
    document.getElementById('add-product-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        // Xử lý ảnh nếu có chọn
        const imageInput = document.getElementById('image');
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                jsonData['image_base64'] = e.target.result; // Gửi base64 lên API
                sendAdd(jsonData);
            };
            reader.readAsDataURL(imageInput.files[0]);
        } else {
            sendAdd(jsonData);
        }
    });

    function sendAdd(jsonData) {
        fetch('/PHAN_NHUT_QUY/api/product', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product created successfully') {
                location.href = '/PHAN_NHUT_QUY/ProductViews/list';
            } else {
                alert('Thêm sản phẩm thất bại');
            }
        })
        .catch(error => {
            alert('Lỗi: Không thể phân tích JSON từ phản hồi của máy chủ.');
        });
    }
});
</script>