var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        product:product,
        pps:[],
        pro_detail_id:null

    },
    created(){
        this.getProDetails();
    },
    methods:{
        changeSize(pro_detail_id){
            axios.get(base_url+'/getprodetailsprice/'+pro_detail_id)
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    self.product.pro_price=response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        getProDetails(){
            self=this;
            axios.get(base_url+'/getprodetails/'+this.product.id)
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    self.pps=response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }
    }
})