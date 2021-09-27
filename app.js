$(document).ready(function () {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      total_cart_items: "totalitems"
    },
    success: function (response) {
      document.getElementById("total_items").value = response;
    }
  });

  show_big_cart();
  show_sum();
  show_products();
});

function itemhover(id){

  $("#item"+id).hover(
    function() { $("#item"+id).addClass( "hover" );}
, function (){$("#item"+id).removeClass( "hover" );
    });
}

function show_big_cart() {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      showcart: "cart-large"
    },
    success: function (response) {
      document.getElementById("items-cart").innerHTML = response;
    }
  });
}
function show_sum() {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      sum: "cart-large"
    },
    success: function (response) {
      document.getElementById("sum").innerHTML = response;
    }
  });
}
function show_products() {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      showcart: "finalise"
    },
    success: function (response) {
      document.getElementById("proizvodi").innerHTML = response;
    }
  });
}

function toggle_cart() {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      showcart: "cart"
    },
    success: function (response) {
      document.getElementById("items").innerHTML = response;
      $("#cart-items").slideToggle();
    }
  });
}


function show_cart() {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      showcart: "cart"
    },
    success: function (response) {
      document.getElementById("items").innerHTML = response;
    }
  });
}

function cart(idInt) {
  let id = idInt.toString();
  let qty = document.getElementById("input" + id).value;
  let qtyTotal = document.getElementById(id + "_qty").value;
  if (qty < 0) {
    alert("Ne može se unjeti negativan broj");
  } else if (parseInt(qty) > parseInt(qtyTotal)) {
    alert("Nažalost nema "+qty+" ulaznica. Ostalo je još " + qtyTotal + " komada.");
  }  else {
    $.ajax({
      type: 'post',
      url: 'load-cart.php',
      data: {
        item_id: id,
        item_qty: qty
      },
      success: function (response) {
        document.getElementById("total_items").value = response;
      }
    });
    show_cart();
    $("#cart-items").show(1000);
    document.getElementById("btnAdd" + id).disabled = true;
    document.getElementById("btnAdd" + id).value = "Dodano";
    document.getElementById("input" + id).disabled = true;
  }
}

function end_session() {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      endSession: 1
    },
    success: function (response) {
      document.getElementById("total_items").value = 0;
      document.getElementById("items").innerHTML = "Košarica je prazna";
    }
  });

}

function remove_from_cart(id) {
  $.ajax({
    type: 'post',
    url: 'load-cart.php',
    data: {
      removeProduct: id
    },
    success: function (response) {
      document.getElementById("total_items").value = response;
      if(response == 0) {
        $("#cutomer").hide();
        $("#order-detail").hide();
      }else {
        $("#cutomer").show();
        $("#order-detail").show();
      }
    }
  });

  show_big_cart();
  show_sum();
  show_products();
  show_cart();
  document.getElementById("btnAdd" + id).disabled = false;
  document.getElementById("input" + id).disabled = false;
  document.getElementById("btnAdd" + id).value = "Add To Cart";

}

function sendmessage() {
  if (validateContactForm()) {
    let name = document.getElementById("inputNameSurname");
    let text = document.getElementById("inputComment");
    let email = document.getElementById("userEmail");
    alert("Mail uspješno poslan. Odgovorit ćemo čim prije na "+email.value+".");
    /*   $.ajax({
        type: 'post',
        url: 'contact-form.php',
        data: {
          contactform: 1,
          name: name,
          text: text,
          email: email
        },
        success: function (response) {
          document.getElementById("contactsucess").innerHTML = response;
        }
      }); */
  }
}
function validateContactForm() {
  var valid = true;
  var userEmail = $("#userEmail").val();
  var userName = $("#inputNameSurname").val();
  var inputComment = $("#inputComment").val();

  if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
    $("#userEmail-info").html("Invalid Email Address.");
    $("#userEmail").css('border', '#e66262 1px solid');
    valid = false;
  }
  if (userEmail =="") {
    $("#userEmail-info").html("Invalid Email Address.");
    $("#userEmail").css('border', '#e66262 1px solid');
    valid = false;
  }
  if (userName =="") {
    $("#userName").css('border', '#e66262 1px solid');
    valid = false;
  }
  if (inputComment =="") {
    $("#inputComment").css('border', '#e66262 1px solid');
    valid = false;
  }

  return valid;
}

