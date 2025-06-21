<?php include 'app/views/shares/header.php'; ?>
<h1>Thêm danh mục mới</h1>
<form id="add-category-form">
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
</form>
<a href="/PHAN_NHUT_QUY/CategoryViews/list" class="btn btn-secondary mt-2">Quay lại danh sách danh mục</a>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('add-category-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        fetch('/PHAN_NHUT_QUY/api/category', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Category created successfully') {
                location.href = '/PHAN_NHUT_QUY/CategoryViews/list';
            } else {
                alert('Thêm danh mục thất bại');
            }
        })
        .catch(error => {
            alert('Lỗi: Không thể phân tích JSON từ phản hồi của máy chủ.');
        });
    });
});
</script>