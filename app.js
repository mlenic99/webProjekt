var cart = {
  hPdt : null, // HTML products list
  hItems: null, // HTML current cart
  items: {},// Current items in cart, This is simply an object that has the format of PRODUCT ID : QUANTITY.

  init: function () {
    // DOHVATI HTML ELEMENTE (proizvodi i košarica)
    cart.hPdt = document.getElementById("cart-products");
    cart.hItems = document.getElementById("cart-items");

    // STVORI LISTU PROIZVODA
    cart.hPdt.innerHTML = "";
    let p, item, part;
    for (let id in products) {

      p = products[id];
      item = document.createElement("div");
      item.className = "p-item col-12 col-md-3";
      cart.hPdt.appendChild(item);

      // PRODUCT IMAGE
      part = document.createElement("img");
      part.src = p.img;
      part.className = "p-img mw-100";
      part.alt = p.name;
      item.appendChild(part);

      // PRODUCT NAME
      part = document.createElement("div");
      part.innerHTML = p.name;
      part.className = "p-name banner-prime-text mt-3 mb-2";
      item.appendChild(part);

      // PRODUCT PRICE
      part = document.createElement("div");
      part.innerHTML = `<span class="price-text-color"> ${p.price},00 kn</span> / kg  `
      part.className = "p-price";
      item.appendChild(part);

      // QUANTITY
      part = document.createElement("span");
      part.innerHTML = `
                <label for="quantity" class="content-text">Količina: </label>
                <input type="number" value="1" class="c-qty input-number ml-1" id="input${id}" min="0" max="99" aria-hidden="true" >`
      item.appendChild(part);

      // ADD TO CART
      part = document.createElement("input");
      part.type = "button";
      part.value = "Add to Cart";
      part.className = "cart p-add btn btn-primary w-75 p-2 mt-2";
      part.onclick = cart.add;
      part.dataset.id = id;
      part.id = "add-btn-" + id;
      item.appendChild(part);
    }
    cart.list();
  },

  list: function () {
    //RESET
    cart.hItems.innerHTML = "";
    cart.hItems.style.display = 'none';
    let item, part, pdt;
    let empty = true;
    total = 0;
    for (let key in cart.items) {
      if (cart.items.hasOwnProperty(key)) { empty = false; break; }
    }
    //CART IS EMPTY
    if (empty) {
      document.querySelector("#item-count").textContent = "0";
      item = document.createElement("div");
      item.innerHTML = `
      <p class="content-text">Moja košarica </p>
      <hr>
      <p>Košarica je prazna </p>
      `;
      cart.hItems.appendChild(item);
    }

    // CART IS NOT EMPTY - LIST ITEMS
    else {
      item = document.createElement("div");
      item.innerHTML = `<p class="content-text">Moja košarica </p><hr>`;
      cart.hItems.appendChild(item);
      cart.hItems.style.display = 'block';
      let p, subtotal = 0, total = 0;
      for (let id in cart.items) {
        // ITEM
        p = products[id];
        item = document.createElement("div");
        item.className = "c-item container row align-items-start";
        cart.hItems.appendChild(item);

        //IMG 
        part = document.createElement("img");
        part.src = p.img;
        part.className = "c-img col-5";
        part.alt = p.name;
        item.appendChild(part);

        // NAME
        part = document.createElement("div");
        part.className = " c-name col";
        subtotal = cart.items[id] * p.price;
        part.innerHTML = ` 
          <p class="cart-title mb-1 font-weight-bold">${p.name}</p>
          <p class="cart-text">Cijena: <span class="font-weight-bold"> ${subtotal},00 kn </span> </p>
          <p class="cart-text">Količina:  <span class="font-weight-bold"> ${cart.items[id]} </span> </p> `;
        item.appendChild(part);

        part = document.createElement("input");
        part.type = "button";
        part.value = "x";
        part.dataset.id = id;
        part.className = "c-del btn col-1";
        part.addEventListener("click", cart.remove);
        item.appendChild(part);
        var a = parseInt(cart.items[id]);
        total += a;
      }

      // CHECKOUT BUTTON
      item = document.createElement("hr")
      cart.hItems.appendChild(item);
      item = document.createElement("input");
      item.type = "button";
      item.value = "KUPI SADA";
      item.addEventListener("click", cart.checkout);
      item.className = "c-checkout cart btn btn-primary";
      cart.hItems.appendChild(item);

      //UPDATE COUNT
      let counter = document.querySelector("#item-count");
      txt = total.toString();
      counter.textContent =txt;
    }
  },

  add: function () {
    let itemCount = document.querySelector("#input"+this.dataset.id).value;
    cart.items[this.dataset.id] = itemCount;
    this.disabled = true;

    cart.list();
  },

  remove: function () {
    delete cart.items[this.dataset.id];
    let btn = document.querySelector("#add-btn-" + this.dataset.id);
    btn.disabled = false;
    cart.list();
  },


}
window.addEventListener("DOMContentLoaded", cart.init);

var cartBtn = document.querySelector("#cart")
cartBtn.onclick = function() {
  var cart = document.querySelector('#cart-items');
  if (cart.style.display !== 'none') {
    cart.style.display = 'none';
  }
  else {
    cart.style.display = 'block';
  }
};



