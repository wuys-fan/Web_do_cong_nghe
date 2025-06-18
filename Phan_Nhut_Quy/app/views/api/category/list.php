<?php include 'app/views/shares/header.php'; ?>
<h1>Danh sách danh mục</h1>
<a href="/PHAN_NHUT_QUY/CategoryViews/add" class="btn btn-success mb-2">Thêm danh mục mới</a>
<ul class="list-group" id="category-list">
    <!-- Danh sách danh mục sẽ được tải từ API và hiển thị tại đây -->
</ul>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/PHAN_NHUT_QUY/api/category')
        .then(response => response.json())
        .then(data => {
            const categoryList = document.getElementById('category-list');
            data.forEach(category => {
                const categoryItem = document.createElement('li');
                categoryItem.className = 'list-group-item';
                categoryItem.innerHTML = `
                    <h2>
                        <a href="/PHAN_NHUT_QUY/CategoryViews/show/${category.id}">
                            ${category.name}
                        </a>
                    </h2>
                    <p>${category.description}</p>
                    <a href="/PHAN_NHUT_QUY/CategoryViews/edit/${category.id}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger" onclick="deleteCategory(${category.id})">Xóa</button>
                `;
                categoryList.appendChild(categoryItem);
            });
        });
});

function deleteCategory(id) {
    if (confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
        fetch(`/PHAN_NHUT_QUY/api/category/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Category deleted successfully') {
                location.reload();
            } else {
                alert('Xóa danh mục thất bại');
            }
        });
    }
}
</script>