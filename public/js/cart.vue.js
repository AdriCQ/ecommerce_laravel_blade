
const host = window.location.origin;
const OrderForm = {
  data() {
    return {
      form: {
        products: [],
        name: '',
        address: '',
        phone: '',
        email: ''
      },
      productsCart: [],
    }
  },
  mounted() {
    this.loadProductCart();
  },
  computed: {
    totalPrice() {
      let total = 0;
      this.productsCart.forEach(_pc => {
        total += Number(_pc.qty * _pc.product.price)
      });
      return total;
    },
    host() { return host; }
  },
  methods: {
    onValueChange(qty, id) {
      if (isNaN(Number(qty)) || qty <= 0)
        this.remove(id);
    },
    clear() {
      shopCartHelper().clear();
    },
    imageUrl(_url) {
      return this.host + _url;
    },
    loadProductCart() {
      const productsCart = shopCartHelper().load();
      axios.get(host + '/api/products/cart', {
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        params: {
          productsCart
        }
      }).then(_resp => {
        if (_resp.data)
          this.productsCart = _resp.data;
      }).catch(_e => { console.log({ error: _e }); modalHandler().error('Atención', '<p>No hay productos en el carrito</p>'); })
    },
    productDetails(_id) {
      return this.host + '/product-details/' + _id;
    },
    remove(_key) {
      this.productsCart.splice(_key, 1);
      shopCartHelper().update(this.productsCart);
    },
    submit() {
      this.form.products = this.productsCart;
      modalHandler().success('Procesando Pedido', 'Estamos procesando su orden. Por favor espere');
      axios.post(this.host + '/api/orders', this.form, {
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        }
      })
        .then(_r => {
          console.log({ response: _r });
          modalHandler().close();
          localStorage.clear();
          window.location = window.location.origin + '/order-completed';
          modalHandler().success('Orden completada', 'La orden se ha almacenado en nuestros servidores');
        })
        .catch(_e => {
          modalHandler().close();
          console.log({ error: _e });
          modalHandler().error('Error', 'No se pudo completar la orden. Revise que los datos estén correctos.');
        });
    }
  }
}

Vue.createApp(OrderForm).mount('#cart-form-vue');