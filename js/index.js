const add_item_form = document.getElementById('add-item-form');

add_item_form.addEventListener('submit', (e) => {
  e.preventDefault();

  let data = new FormData();
  data.append('add_item_form', '');
  data.append('name', document.getElementById('name').value);
  data.append('unit', document.getElementById('unit').value);
  data.append('price', document.getElementById('price').value);
  data.append('expiry_date', document.getElementById('expiry-date').value);
  data.append('available_inventory', document.getElementById('available-inventory').value);
  data.append('image', document.getElementById('image').files[0]);

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'ajax/add_item.php',true);

  xhr.onload = function() {
    console.log(this.responseText);
    if (this.responseText == 1) {
      displayProducts();
      resetModal();
      alert('Item added successfully');
      
    }
  }

  xhr.send(data);
});

function displayProducts() {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'ajax/display_products.php',true);
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhr.onload = function() {
    document.getElementById('products-data').innerHTML = this.responseText;
  }
  xhr.send('get_products=true');
}

function deleteProduct(id) {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'ajax/delete_product.php',true);
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhr.onload = function() {
    console.log(this.responseText);
    displayProducts();
  }
  xhr.send('id='+id);
}

function resetModal() {
  document.getElementById('name').value = '';
  document.getElementById('unit').value = '';
  document.getElementById('price').value = '';
  document.getElementById('expiry-date').value = '';
  document.getElementById('available-inventory').value = '';
  document.getElementById('image').value = '';
}

window.onload = function(){
  displayProducts();
}