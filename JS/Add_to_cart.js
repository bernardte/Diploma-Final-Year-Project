const openCart = document.querySelector(".cart");
const closeCart = document.querySelector(".close-cart");
const list = document.querySelector(".list");
const listCard = document.querySelector(".list-card");
const total = document.querySelector(".total");
const body = document.querySelector("body");
const quantity = document.querySelector(".quantity");

openCart.addEventListener("click", () => {
    body.classList.add("active");
});

closeCart.addEventListener("click", () => {
    body.classList.remove("active");
});

// Function to fetch products from server
const fetchProducts = () => {
    fetch('fetch_product.php')
        .then(response => response.json())
        .then(data => {
            products = data; // Update products array with fetched data
            initApp(); // Call initApp() after fetching products
        })
        .catch(error => console.error('Error fetching products:', error));
};

// Call fetchProducts() to initially load products
fetchProducts();

// Declare an empty listCards array
let listCards = [];

// Function to initialize the app
const initApp = () => {
    // value: represent current product objects.
    // key: represent the index of the product in the array.
    products.forEach((value, key) => {
        // create new div
        let newDiv = document.createElement("div");
        // add class name items to the new div
        newDiv.classList.add("item");
        newDiv.innerHTML = `
            <img src="${value.imagePath}">
            <div class="title">${value.foodName}</div>
            <div class="price">RM ${value.price.toLocaleString()}</div>
            <!-- When user clicks the add to cart button, will pass the 'key' -->
            <!-- index of the product as an argument -->
            <button onclick="addToCart(${key})">Add To Cart</button>
        `;
        list.appendChild(newDiv);
    });
};

// Function to add to cart
// Takes a single argument 'key'
const addToCart = (key) => {
    // Check if the products with given 'key' is already in the
    // 'listCards' array, if it's not, then the product is added to the cart.
    if (listCards[key] == null) {
        // Create a new copy of the product object, which is necessary
        // because we want to modify the quantity of the product in the cart
        // without affecting the original product object.
        listCards[key] = { ...products[key], quantity: 1 };
    } else {
        // Increment the quantity of the product in the cart
        listCards[key].quantity++;
    }
    reloadCard();
};

// Function to format number to two decimal places
const formatToTwoDecimalPlaces = (number) => {
    // Use JavaScript's toFixed method to format the number to two decimal places
    return number.toFixed(2);
};

// Function to reload the cart
const reloadCard = () => {
    // Reset the inner HTML of the listCard to an empty string,
    // which means clearing the cart UI.
    listCard.innerHTML = "";
    // totalPrice: keep track of the total price of the items in the cart.
    let totalQuantity = 0;
    let totalPrice = 0;

    // Iterate through listCards array
    listCards.forEach((value, key) => {
        if (value != null) {
            // Calculate the item price by multiplying the product price by the quantity
            let itemPrice = value.price * value.quantity;
            totalPrice += itemPrice; // accumulate total price
            totalQuantity += value.quantity; // accumulate total quantity

            // Create a new 'li' element to represent the cart item in the UI
            let newDiv = document.createElement("li");
            // Set the inner HTML of the 'li' element
            newDiv.innerHTML = `
                <div><img src="${value.imagePath}"></div>
                <div class="cardTitle">${value.foodName}</div>
                <div class="cardPrice">RM ${formatToTwoDecimalPlaces(itemPrice)}</div>
                <div>
                    <!-- Minus Button: to decrement the quantity on the cart -->
                    <button style="background-color: #4169E1" class="cardButton" onclick="changeQuantity(${key}, ${value.quantity - 1})"> - </button>&nbsp;&nbsp;
                    <!-- To display the total count of items in the cart -->
                    <div class="count">${value.quantity}</div>&nbsp;&nbsp;
                    <!-- Plus Button: to increment the quantity on the cart -->
                    <button style="background-color: #4169E1" class="cardButton" onclick="changeQuantity(${key}, ${value.quantity + 1})"> + </button>
                </div>
            `;
            // Append the new 'li' element to the 'listCard' element,
            // adding the cart item to the UI
            listCard.appendChild(newDiv);
        }
    });

    // Update the text content of the 'total' and 'quantity' elements
    total.innerText = `RM ${formatToTwoDecimalPlaces(totalPrice)}`;
    quantity.innerText = totalQuantity;
};

// Function to change quantity
// key is the index of the cart in the 'listCards' array
// and the quantity is the new quantity of the cart item
const changeQuantity = (key, quantity) => {
    // If the new quantity is 0, delete the cart item from the
    // 'listCards' array by using the 'delete' operator.
    if (quantity == 0) {
        delete listCards[key];
    } else {
        // If the new quantity is not 0, update the cart item's quantity
        listCards[key].quantity = quantity; // Set the new quantity of the cart item.
    }
    reloadCard();
};

// Function to call PHP to save cart
function callPHP(listCards) {
    var usersId = document.getElementById('usersId').value; // Get the ID value from the userId.

    if (listCards.length === 0 || !Array.isArray(listCards)) {
        console.log("listCards is empty or invalid, not sending request");
        return;
    }

    // Filter out the first null array
    var filteredListCards = listCards.filter(function(item) {
        return item !== null;
    });

    // No items inside the cart
    if (filteredListCards.length === 0) {
        console.log("No valid items in listCards, not sending request");
        return;
    }

    var dataToSend = filteredListCards.map(item => ({ ...item, usersId: usersId }));

    // Encode JSON data, takes an array of objects 'filteredListCards'
    // and converts it into a JSON string
    var jsonData = JSON.stringify(dataToSend);
    console.log(jsonData);

    try {
        // Parse a string back into a JavaScript object
        JSON.parse(jsonData);
    } catch (e) {
        console.error("Invalid JSON data:", e);
        return;
    }

    // Ajax request
    var httpc = new XMLHttpRequest();
    var url = 'save_cart.php'; // Send final location
    httpc.open('POST', url, true); // Post method, send final location file or HTTP, specify that the request should be sent asynchronously.
    httpc.setRequestHeader('Content-Type', 'application/json'); // Indicating that the request body contains JSON data

    // Event handler checks if the request was successful (readyState == 4 and status == 200)
    httpc.onreadystatechange = function() {
        if (httpc.readyState == 4) {
            if (httpc.status == 200) {
                // Do nothing, data inserted successfully
            } else {
                alert("Error: " + httpc.status + " - " + httpc.statusText);
            }
        }
    };
    httpc.send(jsonData);
}
