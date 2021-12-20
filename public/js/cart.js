function shopCartHelper() {
    const STORAGE_KEY = 'SHOP/CART';
    let productsCart = [];
    /**
     * addProductCart
     * @param {*} product 
     * @param {*} qty 
     */
    function addProductCart(product, qty) {
        load();
        const index = productsCart.findIndex(_p => _p.product.id === product.id);
        if (index >= 0) {
            const qty = Number(productsCart[index].qty);
            productsCart[index] = {
                product: product,
                qty: qty + 1
            }
        } else {
            productsCart.push({
                product, qty
            });
        }
        document.getElementById('cart-count').innerHTML = productsCart.length;
        save();
        load();
    }

    function removeProductCart(_key) {
        load();
        if (productsCart[_key]) {
            productsCart.splice(_key, 1);
        }
        save();
        load();
    }
    /**
     * load
     * @returns 
     */
    function load() {
        const item = localStorage.getItem(STORAGE_KEY);
        if (item) {
            productsCart = JSON.parse(item)
        } else {
            productsCart = []
        }
        console.log({ productsCart })
        loadCartUrl(productsCart);
        return productsCart;
    }
    /**
     * save
     */
    function save() {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(productsCart))
    }

    function loadCartUrl(productsCart) {
        // load();
        const host = window.location.origin;
        document.getElementById('to-cart-anchor').href = host + '/cart?productsCart=' + JSON.stringify(productsCart);
        document.getElementById('to-cart-tab').href = host + '/cart?productsCart=' + JSON.stringify(productsCart);
    }

    function clear() {
        localStorage.clear();
        window.location = window.location.origin;
    }

    return {
        productsCart, addProductCart, removeProductCart, load, save, loadCartUrl, clear
    }
}