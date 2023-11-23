document.addEventListener('DOMContentLoaded', function () {
    fetchOrders();
});

function fetchOrders() {

    const orders = [
        { id: 1, customer: 'Trịnh Minh Đức ', total: 150000, date: ' 2023/11/22' },
        { id: 2, customer: 'Phạm Hồng Dương', total: 50000, date: '2023/11/23' },
        { id: 3, customer: 'Nguyễn Công Thành', total: 300000, date: '2023/11/24' },
    ];

    renderOrders(orders);
}

function renderOrders(orders) {
    const orderList = document.getElementById('order-list');
    orderList.innerHTML = '';

    orders.forEach(order => {
        const div = document.createElement('div');
        div.classList.add('order');
        div.innerHTML = `<strong>Đơn hàng ${order.id}</strong> - ${order.customer} - ${order.total}VND- ${order.date}`;
        div.addEventListener('click', () => showOrderDetails(order.id));
        orderList.appendChild(div);
    });
}

function showOrderDetails(orderId) {
    const orderDetails = document.getElementById('order-details');
    orderDetails.innerHTML = '';
    const order = { id: 1, customer: 'Trịnh Minh Đức', total: '150.000', date: '2023-11-22', items: ['Sách Đọc nhất', 'Sách Con đường'] };
    const div = document.createElement('div');
    div.classList.add('order-details');
    div.innerHTML = `
        <h2>Thông Tin Đơn Hàng</h2>
        <p><strong>ID:</strong> ${order.id}</p>
        <p><strong>Tên Khách Hàng:</strong> ${order.customer}</p>
        <p><strong>Tổng:</strong> ${order.total}VND</p>
        <p><strong>Ngày:</strong> ${order.date}</p>
        <p><strong>Sản Phẩm:</strong> ${order.items.join(', ')}</p>
        <button id="close-details">Thoát</button>
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
