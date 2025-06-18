<?php include 'app/views/shares/header.php'; ?>
<h1>Sửa danh mục</h1>
<form id="edit-category-form">
    <input type="hidden" id="id" name="id">
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
<a href="/PHAN_NHUT_QUY/CategoryViews/list" class="btn btn-secondary mt-2">Quay lại danh sách danh mục</a>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const categoryId = <?= json_encode($editId ?? $id ?? null) ?>;
    // Lấy thông tin danh mục
    fetch(`/PHAN_NHUT_QUY/api/category/${categoryId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('id').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description;
        });

    document.getElementById('edit-category-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        fetch(`/PHAN_NHUT_QUY/api/category/${jsonData.id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Category updated successfully') {
                location.href = '/PHAN_NHUT_QUY/CategoryViews/list';
            } else {
                alert('Cập nhật danh mục thất bại');
            }
        });
    });
});
</script>