var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        carts:{}
    },
    created(){
        this.getCart()
    },
    methods:{
        changeQty(rowId,qty){
            console.log(rowId,qty)
            self=this;
            axios.get(base_url+'/cart/update/'+rowId+'/'+qty)
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    self.carts=response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        getImg(img){
            return base_url+'/images/'+img;
        },
        getCart(){
            self=this;
            axios.get(base_url+'/cart/get')
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    self.carts=response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }
    }
})