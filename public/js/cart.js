updateCart();

function bubbleSortByTime(objects) {
    var len = objects.length;
    var swapped;

    do {
        swapped = false;
        for (var i = 0; i < len - 1; i++) {
            // So sánh các phần tử liền kề
            if (objects[i].added < objects[i + 1].added) {
                // Hoán đổi hai phần tử nếu thứ tự không đúng
                var temp = objects[i];
                objects[i] = objects[i + 1];
                objects[i + 1] = temp;
                swapped = true;
            }
        }
    } while (swapped);

    return objects;
}

function loadCarts() {
    var casts = JSON.parse(
        localStorage.getItem('carts') ?? "[]"
    );
    casts = bubbleSortByTime(casts);
    return casts;
}

function saveCart(carts) {
    localStorage.setItem('carts', JSON.stringify(carts));
}

function deleteCart(id) {
    let carts = loadCarts();
    var newCarts = [];
    var isDelete = false;
    for(let cart of carts){
        if(cart.id == id){
            if(!isDelete) {
                isDelete = true;
            } else {
                newCarts.push(cart);
            }
        } else {
            newCarts.push(cart);
        }
    }
    saveCart(newCarts);
}

function deleteCartAll(id) {
    let carts = loadCarts();
    carts = carts.filter(function (cart) {
        return cart.id !== id
    })
    saveCart(carts);
}

function loadFormatCarts()
{
    var newCarts = [];
    var carts = loadCarts();
    for (let cart of carts) {
        var exist = false;

        //check xem đã thêm vô list chưa
        for(let childCart of newCarts){
            if(cart.id == childCart.id){
                exist = true;
                break;
            }
        }

        //
        if(exist) {
            for (let i = 0; i < newCarts.length; i++) {
                if (newCarts[i].id == cart.id) newCarts[i].count++;
            }
        } else {
            newCarts.push(
                {
                    ...cart,
                    "count": 1
                }
            );
        }
    }

    return newCarts;
}

function getLengthCasts(){
    // return 2;
    return loadFormatCarts().length;
}

function updateCart() {
    let element = document.getElementById('cart_list');
    if(!element){
        console.log("Không tìm thấy cart element");
    }
    // console.log(element);
    element.innerHTML = "";

    let data = ``;

    var carts = loadFormatCarts();
    // console.log(carts);
    for (let cart of carts) {
        data += `
        <div class="border-bottom mb-3 py-3">
                  <div class="row">
                      <div class="col-2 col-md-2">
                          <img src="${cart.img}"
                               class="w-100">
                      </div>
                      <div class="col-6 col-md-6">
                          <h6>${cart.name}</h6>
                          <a class="text-decoration-none" href="#" onclick="removeCartAll('${cart.id}')">
                            <span class="text-success"><i class="fa-solid fa-trash-can"></i> Xóa</span>
                            </a>
                      </div>
                      <div class="col-4 col-md-4">
                          <b>${new Intl.NumberFormat().format(cart.price)}đ
                          <div class="input-group input-group-sm">
                              <button class="input-group-text" onclick="removeCart('${cart.id}')">-</button>
                              <input class="form-control" type="number" value="${cart.count}">
                              <button class="input-group-text" onclick='upCart(
                                  ${JSON.stringify(cart)}
                              )'>+</button>
                          </div>
                      </div>
                  </div>
              </div>
        `;
    }
    document.getElementById('cart_list').innerHTML = data;
    document.getElementById('cart_total').innerHTML = new Intl.NumberFormat().format(
        cartTotal()
    );
    document.getElementById('cart_count').innerHTML = getLengthCasts();
}

function addCart(product) {
    var carts = loadCarts();
    product.added = Math.floor(Date.now() / 1000);
    carts.push(product);
    saveCart(carts);
    updateCart();
    notify('success', 'Thêm vào giỏ hàng thành công');
}

function upCart(product) {
    var carts = loadCarts();
    carts.push(product);
    saveCart(carts);
    updateCart();
    notify('success', 'Thêm vào giỏ hàng thành công', 'left');
}

function removeCart(id) {
    deleteCart(id);
    updateCart();
    notify('success', 'Xóa khỏi giỏ hàng thành công', 'left');
}

function removeCartAll(id) {
    deleteCartAll(id);
    updateCart();
    notify('success', 'Xóa khỏi giỏ hàng thành công', 'left');
}

function clearCarts() {
    localStorage.setItem("carts", "[]");
}

function cartTotal() {
    let total = 0;
    let carts = loadCarts();
    for (let cart of carts) {
        // console.log(cart.price);
        total += Number(cart.price);
    }
    console.log(total);
    return total;
}