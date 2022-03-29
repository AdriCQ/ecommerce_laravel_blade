
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
    host() { return host; },
    appCurrency() {
      return currency;
    }
  },
  methods: {
    onValueChange(qty, id) {
      if (isNaN(Number(qty)) || qty <= 0)
        this.remove(id);
      else {
        shopCartHelper().update(this.productsCart);
      }
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
      }).catch(_e => { console.log({ error: _e }); localStorage.clear(); modalHandler().error('Atención', '<p>No hay productos en el carrito</p>'); })
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
      if (localStorage.getItem('orderId')) {
        axios.post(this.host + '/api/orders/rem',
          { orderId: Number(localStorage.getItem('orderId')) },
          {
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            }
          }).then(() => {
            axios.post(this.host + '/api/orders', this.form, {
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
              }
            })
              .then(_r => {
                console.log(_r);
                if (_r.status === 200 || _r.status === 201) {
                  localStorage.setItem('orderId', _r.data.id);
                  window.location = window.location.origin + `/order/pay/${_r.data.id}`;
                } else {
                  modalHandler().close();
                  modalHandler().error('Error', 'No se pudo completar la orden. Revise que los datos estén correctos.');
                }
              })
              .catch(_e => {
                modalHandler().close();
                modalHandler().error('Error', 'No se pudo completar la orden. Revise que los datos estén correctos.');
              });
          }).catch(e => { console.log(e) })
      } else {
        axios.post(this.host + '/api/orders', this.form, {
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        })
          .then(_r => {
            localStorage.setItem('orderId', _r.data.id);
            window.location = window.location.origin + `/order/pay/${_r.data.id}`;
          })
          .catch(_e => {
            modalHandler().close();
            console.log({ error: _e });
            modalHandler().error('Error', 'No se pudo completar la orden. Revise que los datos estén correctos.');
          });
      }
    }
  }
}

Vue.createApp(OrderForm).mount('#cart-form-vue');