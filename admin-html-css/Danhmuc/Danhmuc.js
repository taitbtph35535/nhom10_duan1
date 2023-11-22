// admin.js
// Giả định dữ liệu ban đầu
let categories = [
    { id: 1, name: "Danh mục 1", genre: "Thể loại 1" },
    { id: 2, name: "Danh mục 2", genre: "Thể loại 2" },
    // ...
];

// Hiển thị dữ liệu ban đầu
displayCategories();

// Hàm hiển thị dữ liệu danh mục
function displayCategories() {
    let tableBody = $("#categoryTable tbody");
    tableBody.empty();

    for (let category of categories) {
        let row = $("<tr>");
        row.append($("<td>").text(category.name));
        row.append($("<td>").text(category.genre));
        row.append($("<td>").html(`<button onclick="editCategory(${category.id})">Sửa</button> <button onclick="deleteCategory(${category.id})">Xóa</button>`));

        tableBody.append(row);
    }
}

// Hàm thêm danh mục mới
function addCategory() {
    let categoryName = $("#categoryName").val();
    let genre = $("#genre").val();

    if (categoryName && genre) {
        let newCategory = {
            id: categories.length + 1,
            name: categoryName,
            genre: genre
        };

        categories.push(newCategory);
        displayCategories();

        // Đặt lại giá trị trong các ô nhập liệu
        $("#categoryName").val("");
        $("#genre").val("");
    } else {
        alert("Vui lòng nhập đầy đủ thông tin danh mục.");
    }
}

// Hàm sửa thông tin danh mục
function editCategory(id) {
    let editedCategory = categories.find(category => category.id === id);

    if (editedCategory) {
        let newName = prompt("Nhập tên mới cho danh mục:", editedCategory.name);
        let newGenre = prompt("Nhập thể loại mới:", editedCategory.genre);

        if (newName !== null && newGenre !== null) {
            editedCategory.name = newName;
            editedCategory.genre = newGenre;
            displayCategories();
        }
    }
}

// Hàm xóa danh mục
function deleteCategory(id) {
    let confirmation = confirm("Bạn có chắc chắn muốn xóa danh mục này?");

    if (confirmation) {
        categories = categories.filter(category => category.id !== id);
        displayCategories();
    }
}
