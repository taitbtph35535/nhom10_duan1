document.addEventListener('DOMContentLoaded', function () {
    fetchOrders();
});

function fetchOrders() {
    // Sử dụng XMLHttpRequest hoặc Fetch API để gửi yêu cầu lấy danh sách đơn hàng từ server
    // Ở đây, chúng ta chỉ sử dụng một mảng giả định

    const orders = [
        { id: 1, customer: 'John Doe', total: 50.0, date: '2023-11-22' },
        { id: 2, customer: 'Jane Doe', total: 75.5, date: '2023-11-23' },
        { id: 3, customer: 'Bob Smith', total: 30.2, date: '2023-11-24' },
    ];

    renderOrders(orders);
}

function renderOrders(orders) {
    const orderList = document.getElementById('order-list');
    orderList.innerHTML = '';

    orders.forEach(order => {
        const div = document.createElement('div');
        div.classList.add('order');
        div.innerHTML = `<strong>Order #${order.id}</strong> - ${order.customer} - $${order.total} - ${order.date}`;
        div.addEventListener('click', () => showOrderDetails(order.id));
        orderList.appendChild(div);
    });
}

function showOrderDetails(orderId) {
    const orderDetails = document.getElementById('order-details');
    orderDetails.innerHTML = '';

    // Gửi yêu cầu lấy chi tiết đơn hàng từ server
    // Ở đây, chúng ta chỉ sử dụng một đơn hàng giả định
    const order = { id: 1, customer: 'John Doe', total: 50.0, date: '2023-11-22', items: ['Item 1', 'Item 2'] };

    const div = document.createElement('div');
    div.classList.add('order-details');
    div.innerHTML = `
        <h2>Order Details</h2>
        <p><strong>Order ID:</strong> ${order.id}</p>
        <p><strong>Customer:</strong> ${order.customer}</p>
        <p><strong>Total:</strong> $${order.total}</p>
        <p><strong>Date:</strong> ${order.date}</p>
        <p><strong>Items:</strong> ${order.items.join(', ')}</p>
        <button id="close-details">Close Details</button>
    `;
    orderDetails.appendChild(div);

    const closeButton = document.getElementById('close-details');
    closeButton.addEventListener('click', () => hideOrderDetails());

    orderDetails.classList.remove('hidden');
}

function hideOrderDetails() {
    const orderDetails = document.getElementById('order-details');
    orderDetails.innerHTML = '';
    orderDetails.classList.add('hidden');
}
