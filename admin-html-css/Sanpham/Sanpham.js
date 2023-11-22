// Sample data
const products = [
    { id: 1, name: "Product 1", category: "Category A" },
    { id: 2, name: "Product 2", category: "Category B" },
    { id: 3, name: "Product 3", category: "Category A" }
];

// Function to render products in the table
function renderProducts() {
    const productBody = document.getElementById("productBody");
    productBody.innerHTML = "";

    products.forEach(product => {
        const row = `<tr>
                        <td>${product.id}</td>
                        <td>${product.name}</td>
                        <td>${product.category}</td>
                        <td>
                            <button onclick="editProduct(${product.id})">Sửa</button>
                            <button onclick="deleteProduct(${product.id})">Xóa</button>
                        </td>
                    </tr>`;
        productBody.innerHTML += row;
    });
}

// Function to add a new product
function addProduct() {
    const newName = prompt("Nhập tên sản phẩm:");
    const newCategory = prompt("Nhập thể loại sản phẩm:");

    const newProduct = {
        id: products.length + 1,
        name: newName,
        category: newCategory
    };

    products.push(newProduct);
    renderProducts();
}

// Function to edit a product
function editProduct(id) {
    const product = products.find(p => p.id === id);

    const newName = prompt("Nhập tên sản phẩm:", product.name);
    const newCategory = prompt("Nhập thể loại sản phẩm:", product.category);

    product.name = newName;
    product.category = newCategory;

    renderProducts();
}

// Function to delete a product
function deleteProduct(id) {
    const index = products.findIndex(p => p.id === id);
    products.splice(index, 1);
    renderProducts();
}

// Initial render
renderProducts();
