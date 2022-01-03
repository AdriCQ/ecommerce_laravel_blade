const host = window.location.origin;
const findVue = {
    data() {
        return {
            name: '',
            email: '',
            orderId: ''
        }
    },
    methods: {
        onSubmit() {
            axios.get(`${host}/api/orders/find`, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                params: {
                    name: this.name,
                    email: this.email,
                    orderToken: this.orderId
                }
            }).then(() => {
                modalHandler().success('Rastreo Enviado',
                    'Ya hemos enviado su solicitud de rastreo. Le contactaremos a su email para informarle');
                this.name = '';
                this.email = '';
                this.orderId = '';
            }).catch(_e => {
                console.log({ error: _e });
                modalHandler().error('Error', 'Verifique los datos');
            })
        }
    }
};

Vue.createApp(findVue).mount('#find-vue');