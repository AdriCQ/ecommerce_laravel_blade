@extends('layout.main')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carrito</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area" style="margin: 2rem 0 2rem 0" id="cart-form-vue">
        {{-- <div class="zigzag-bottom"></div> --}}
        <div class="container">
            <x-slider.destination :destinations="$destinations" />
            <div class="row"  v-if="productsCart.length">                
                <div class="col-12">
                    <div class="product-content-right">
                        {{-- Vue --}}
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Producto</th>
                                        <th class="product-price">Precio</th>
                                        <th class="product-quantity">Cantidad</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item" v-for="(pc, pKey) in productsCart" :key="`prod-cart-${pKey}`">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" @click="remove(pKey)">×</a> 
                                        </td>

                                        <td class="product-thumbnail">
                                            <a :href="productDetails(pc.product.id)"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" :src="imageUrl(pc.product.image)"></a>
                                        </td>

                                        <td class="product-name">
                                            <a :href="productDetails(pc.product.id)">@{{ pc.product.name }}a</a> 
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">$@{{ Number(pc.product.price).toFixed(2) }}</span> 
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" v-model="pc.qty" min="0" step="1">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">$@{{ Number(pc.qty * pc.product.price).toFixed(2) }}</span> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="card">
                        <div class="card-title">
                            <h4>Resumen del pedido</h4>
                        </div>
                        <div class="card-content">
                            Precio Total: $@{{ Number(totalPrice).toFixed(2) }}
                        </div>
                        <div class="card-content" style="margin-top: 1rem">
                            <p>
                            <i>*Tenga presente que se adiciona el precio de envío a su destinación</i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <form method="post" action="#">
                        <div>
                            <div class="form-group">
                                <label for="input-name">Nombre</label>
                                <input v-model="form.name" class="form-control" id="input-name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="input-address">Dirección</label>
                                <input v-model="form.address" class="form-control" id="input-address" type="text">
                            </div>
                            <div class="form-group">
                                <label for="input-email">Email</label>
                                <input v-model="form.email"  class="form-control" id="input-email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="input-tel">Teléfono</label>
                                <input v-model="form.phone"  class="form-control" id="input-tel" type="tel">
                            </div>
                            <div name="update_cart" @click="clear" class="btn btn-danger">Limpiar Carrito</div>
                            <div class="btn c-primary" style="margin-left: 1rem" @click="submit">Enviar</div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()


@section('scripts')

<script type="text/javascript">
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
    mounted(){
        this.loadProductCart();
    },
    computed:{
        totalPrice(){
            let total = 0;
            this.productsCart.forEach(_pc => {
                total += Number(_pc.qty * _pc.product.price)
            });
            return total;
        },
        host(){return host;}
    },
    methods: {
        clear(){
            shopCartHelper().clear();
        },
        imageUrl(_url){
            return this.host + _url;
        },
        loadProductCart(){
            const productsCart = shopCartHelper().load();
            axios.get(host + '/api/products/cart', {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                params: {
                    productsCart
                }
            }).then(_resp=>{
                if(_resp.data)
                    this.productsCart = _resp.data;
            }).catch(_e=>{console.log({error: _e}); modalHandler().error('Atención', '<p>No hay productos en el carrito</p>');})
        },
        productDetails(_id){
            return this.host + '/product-details/' + _id;
        },
        remove(_key){
            this.productsCart.splice(_key,1);
            shopCartHelper().update(this.productsCart);
        },
        submit(){
            this.form.products = this.productsCart;
            axios.post(this.host + '/api/orders', this.form, {
                headers:{
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
                .then(_r=>{console.log({response: _r}); modalHandler().success('Orden completada', 'La orden se ha almacenado en nuestros servidores')})
                .catch(_e=>{console.log({error: _e}); modalHandler().error('Error', 'No se pudo completar la orden. Revise que los datos estén correctos.')});
        }
    }
}

Vue.createApp(OrderForm).mount('#cart-form-vue');
</script>

@endsection()